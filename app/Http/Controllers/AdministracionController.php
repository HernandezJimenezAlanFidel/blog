<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use PDF;
use DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Tarjeta;
use App\Models\Producto;
use App\Models\Users;
use App\Models\UserRole;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministracionController extends Controller
{
    use UploadTrait;
    public function registrocliente(Request $request)
    {

       return view("RegistroCliente");
    }
    public function registrarcompra(){
        $idVenta=Venta::create([
            'idcliente'=>'0',
            'fecha_venta'=>date('Y-m-d'),
            'idusuario'=>@auth()->user()->id,
            'metodo_pago'=>request('metodo_pago'),
            'total'=>request('total')
        ])->idventa;

        if(isset($idVenta)){
            foreach(request('compra') as $key){
                DetalleVenta::create([
                    'idventa'=>$idVenta,
                    'idproducto'=>$key['id'],
                    'cantidad'=>$key['cantidad'],
                    'monto'=>($key['cantidad']*$key['precio'])
                ]);
            }
        }

        return response()->json(['idVenta'=>$idVenta]);
    }
    public function crearcliente (Request $request)
  {
      $cliente= new Cliente;
      $cliente->nombre=$request->get('nombre_cliente');
      $cliente->direccion=$request->get('domicilio');
      $cliente->telefono=$request->get('telefono_cliente');
      $cliente->fecha_nac=$request->get('fecha_nacimiento');
      $cliente->fecha_reg=$request->get('fecha_registro');
      $cliente->sexo=$request->get('sexo_cliente');
      $cliente->activo=1;
      $cliente->save();
      return Redirect::to('/indexcliente');
  }
  public function editcliente($id){
      $cliente=Cliente::where('idcliente',$id)->take(1)->first();
      return view("ActualizarCliente",["cliente"=>$cliente]);
  }

  public function actualizarcliente(Request $request,$id){
    $cliente=Cliente::where('idcliente',$id)->take(1)->first();
    $cliente->nombre=$request->get('nombre_cliente');
    $cliente->direccion=$request->get('domicilio_cliente');
    $cliente->telefono=$request->get('telefono_cliente');
    $cliente->fecha_nac=$request->get('fecha_nacimiento');
    $cliente->fecha_reg=$request->get('fecha_registro');
    $cliente->sexo=$request->get('sexo_cliente');
    $cliente->activo=1;
    $cliente->save();
    return Redirect::to('/inicio');
  }
  public function eliminarcliente(Request $request,$id){
    $cliente=Cliente::where('idcliente',$id)->take(1)->first();
    $cliente->activo=0;
    $cliente->save();
    return Redirect::to('/indexcliente');
  }


    ///metodos producto
    public function indexproducto(Request $request)
    {
        $torneos=DB::table('producto as c')
        ->select('c.idproducto','c.nombre','c.cantidad','c.precio','c.categoria');
        $torneos=$torneos->get();
        return view('categoria-inicio',["producto"=>$torneos]);

    }
    public function registroproducto(Request $request)
    {

       return view("RegistroProducto");
    }
    public function crearproducto (Request $request)
  {
      $producto= new Producto;
      $producto->idproducto=$request->get('id_producto');
      $producto->nombre=$request->get('nombre_producto');
      $producto->cantidad=$request->get('cantidad_producto');
      $producto->precio=$request->get('precio_producto');
      $producto->categoria=$request->get('categoria_producto');
      $producto->save();


  //  $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
    //request()->imagen->move(public_path('images'), $imageName);

      return Redirect::to('/indexproducto');
  }

  public function editproducto($id){
      $producto=Producto::where('idproducto',$id)->take(1)->first();
      return view("ActualizarProducto",["producto"=>$producto]);
  }

  public function actualizarproducto (Request $request,$id)
{
    $producto=Producto::where('idproducto',$id)->take(1)->first();
    $producto->idproducto=$request->get('id_producto');
    $producto->nombre=$request->get('nombre_producto');
    $producto->cantidad=$request->get('cantidad_producto');
    $producto->precio=$request->get('precio_producto');
    $producto->categoria=$request->get('categoria_producto');

     if ($request->hasFile('imagen')) {
       // Get image file
               $image = $request->file('imagen');
               // Make a image name based on user name and current timestamp
               $name = Str::slug($request->input('nombre_producto')).'_'.time();

               // Define folder path
               $folder = '/uploads/images/';
               $this->deleteOne($folder,'public',$producto->imagen);
               // Make a file path where image will be stored [ folder path + file name + file extension]
               $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
               // Upload image
               $this->uploadOne($image, $folder, 'public', $name);
               // Set user profile image path in database to filePath
               $producto->imagen = $filePath;
           }
           $producto->save();
    return Redirect::to('/indexproducto');
}

  public function eliminarproducto(Request $request,$id)
  {
    DB::table('producto')->where('idproducto', '=', $id)->delete();
    return Redirect::to('/indexproducto');
  }




    public function indexcliente(Request $request)
    {
        $torneos=DB::table('cliente as c')
        ->select('c.idcliente','c.nombre','c.direccion','c.telefono','c.sexo')
        ->where('c.activo','=','1');
        $torneos=$torneos->get();
        return view('cliente-inicio',["clientes"=>$torneos]);

    }
    public function indexmembresia(Request $request)
    {
        $torneos=DB::table('cliente as c')
        ->join('tarjeta as t','t.idtarjeta','=','c.idtarjeta')
        ->select('c.idcliente','c.nombre','c.telefono','t.idtarjeta','t.tipo as tipotarjeta','t.fondo_disponible as fondotarjeta')
        ->where('c.activo','=','1')
        ->where('t.activo','=','1');
        $torneos=$torneos->get();
        return view('membresia-inicio',["clientes"=>$torneos]);

    }
    public function eliminartarjeta(Request $request,$id){
      $tarjeta=Tarjeta::where('idtarjeta',$id)->take(1)->first();
      $tarjeta->activo=0;
      $tarjeta->save();
      return Redirect::to('/indexmembresia');
    }
    public function registromembresia(Request $request)
    {

       return view("RegistroMembresia");
    }

    public function indextrabajador(Request $request)
    {
        $torneos=DB::table('users as u')
        ->join('role_user as ru','u.id','=','ru.user_id')
        ->join('roles as r','ru.role_id','=','r.id')
        ->select('u.id as idempleado','u.name as nombre','r.description as tipo','u.email');
        $torneos=$torneos->get();
        return view('trabajador-inicio',["empleado"=>$torneos]);

    }
    public function registrotrabajador(Request $request)
    {

       return view("RegistroTrabajador");
    }
    public function creartrabajador(Request $request)
    {
      $reglas=[
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8'],
      ];
      $datos=['name'=>$request->get('name'),
              'email'=>$request->get('email'),
              'password'=>$request->get('password'),];

      $validator=Validator::make($datos,$reglas);
      if ( $validator->fails() ) {
        return Redirect::to('/registrotrabajador')
          ->withErrors($validator);
    }
      $users= new Users;
      $users->name=$request->get('name');
      $users->email=$request->get('email');
      $users->password=Hash::make($request->get('password'));
      $users->save();

      $UserRole= new UserRole;
      $UserRole->user_id=$users->id;
      $torneos=DB::table('roles as r')
      ->select('r.id')
      ->where('r.name','=',$request->get('tipo'))
      ->take(1)->first();
      $UserRole->role_id=$torneos->id;
      $UserRole->save();

      return Redirect::to('/indextrabajador');
    }

    public function corte(Request $request)
    {$totalIngresos=0;
      if($request->get('tipocorte')=="0")
      { $fecha=$request->get('fecha');

         if($request->get('categoria')=="0")
          {
            error_log('entrada1');
            $torneos=DB::table('venta')
            ->where('fecha_venta','=',$fecha)
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->total;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos];
            return PDF::loadView('corte', $data)->stream('corte.pdf');

            //return view('corte',["venta"=>$torneos,"fecha"=>$fecha]);
          }
          else {
            error_log('entrada2');
            $torneos=DB::table('venta as v')
            ->join('detalle_venta as dv','dv.idventa','=','v.idventa')
            ->join('producto as p','p.idproducto','=','dv.idproducto')
            ->select('v.idventa as idventa','v.idusuario','p.nombre as nombreproducto','dv.cantidad as cantidadventa'
                      ,'dv.monto as montoventa','v.fecha_venta as fecha_venta','v.fecha_venta','v.metodo_pago as metodopago')
            ->where('p.categoria','=',$request->get('categoria'))
            ->where('fecha_venta','=',$fecha)
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->montoventa;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos];
            return PDF::loadView('cortecategoria', $data)->stream('corte.pdf');
            }
    }
    else {

      $fecha=$request->get('reservation');
      $split = explode('-', $fecha);
      $fechainicio=date("Y-m-d", strtotime($split[0]));
      $fechafinal=date("Y-m-d", strtotime($split[1]));
          if($request->get('categoria')=="0")
            {
              $torneos=DB::table('venta')
              ->whereBetween('fecha_venta',[$fechainicio,$fechafinal])
              ->get();
              foreach ($torneos as $venta)
                  $totalIngresos+=$venta->total;


              $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos];
              return PDF::loadView('corte', $data)->stream('corte.pdf');
            }
         else
          {
            $torneos=DB::table('venta as v')
            ->join('detalle_venta as dv','dv.idventa','=','v.idventa')
            ->join('producto as p','p.idproducto','=','dv.idproducto')
            ->select('v.idventa as idventa','v.idusuario','p.nombre as nombreproducto','dv.cantidad as cantidadventa'
                      ,'dv.monto as montoventa','v.fecha_venta as fecha_venta','v.metodo_pago as metodopago')
            ->where('p.categoria','=',$request->get('categoria'))
            ->whereBetween('fecha_venta',[$fechainicio,$fechafinal])
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->montoventa;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos];
            return PDF::loadView('cortecategoria', $data)->stream('corte.pdf');
        }
    }

    }



    //impresion termica
    public function impresion()
    {
      $nombreImpresora = "POS-58";
      $connector = new WindowsPrintConnector($nombreImpresora);
      $impresora = new Printer($connector);
      $impresora->setJustification(Printer::JUSTIFY_CENTER);
      $impresora->setTextSize(2, 2);
      $impresora->text("Imprimiendo\n");
      $impresora->text("ticket\n");
      $impresora->text("desde\n");
      $impresora->text("Laravel\n");
      $impresora->setTextSize(1, 1);
      $impresora->text("https://parzibyte.me");
      $impresora->feed(5);
      $impresora->close();

      return Redirect::to('/');


    }
    public function impresion2()
    {
      $torneos=DB::table('detalle_venta as dv')
      ->select('p.nombre as nombre','dv.cantidad','dv.monto')
      ->join('producto as p','p.idproducto','=','dv.idproducto')
      ->where('dv.idventa','=',request('id'))
      ->get();
      $totalIngresos=0;
      foreach ($torneos as $venta)
          $totalIngresos+=$venta->monto;
      return view('Ticket',['producto'=>$torneos,'totalventa'=>$totalIngresos,'idVenta'=>request('id')]);
    }


}
?>

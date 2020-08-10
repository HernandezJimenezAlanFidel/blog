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
    public function registrarcompra(){
        $idVenta=Venta::create([
            'idcliente'=>'0',
            'fecha_venta'=>date('Y-m-d H:i:s'),
            'idusuario'=>@auth()->user()->id,
            'metodo_pago'=>request('metodo_pago'),
            'total'=>request('total'),
            'nombreComprador'=>request('nombreCliente'),
            'activo'=>1
        ])->idventa;

        if(isset($idVenta)){
            foreach(request('compra') as $key){
                $producto=Producto::where('idproducto',$key['id'])->select('cantidad');
                $cantidad=(int)$producto->first()->cantidad;;
                if($cantidad>=$key['cantidad']){
                    DetalleVenta::create([
                        'idventa'=>$idVenta,
                        'idproducto'=>$key['id'],
                        'cantidad'=>$key['cantidad'],
                        'monto'=>($key['cantidad']*$key['precio'])
                    ]);
                    $cantidadActual = $cantidad - $key['cantidad'];
                    Producto::where('idproducto',$key['id'])->update(['cantidad' => $cantidadActual]);
                }else{
                    return ['error'=>true,
                            'mensaje'=>'Cantidad insuficiente en el stock de '.$key['nombre']];
                }
            }
        }

        return response()->json(['idVenta'=>$idVenta]);
    }

    public function eliminarventa(Request $request,$id)
    {
      $venta=Venta::where('idventa',$id)->take(1)->first();
      $venta->activo=0;
      $venta->save();
      return Redirect::to('ventas');
    }
//metodos cliente


    public function indexcliente(Request $request)
    {
        $torneos=DB::table('cliente as c')
        ->select('c.idcliente','c.nombre','c.direccion','c.telefono','c.sexo')
        ->where('c.activo','=','1');
        $torneos=$torneos->get();
        return view('cliente-inicio',["clientes"=>$torneos]);

    }
    public function registrocliente(Request $request)
      {

          return view("RegistroCliente");
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
        ->select('c.idproducto','c.nombre','c.cantidad','c.precio','c.categoria')
        ->where('c.activo','=','1');
        $torneos=$torneos->get();
        return view('categoria-inicio',["producto"=>$torneos]);

    }

    public function ventas(Request $request)
    {
        $productos=[];
        $torneos=DB::table('venta as v')
        ->select('v.idventa','v.fecha_venta','v.metodo_pago','v.total')
        ->where('v.activo','=','1');
        $listado=$torneos->orderBy('v.fecha_venta','desc')->get();
        foreach ($listado as $idVenta) {
            $products=DB::table('detalle_venta as d_v')->join('producto as p','d_v.idproducto','=','p.idproducto')
                                ->select('p.nombre','p.precio','d_v.cantidad','d_v.monto')
                                ->where('d_v.idventa','=',$idVenta->idventa);
            $productosVenta=$products->get();
            array_push($productos,$productosVenta);
        }
        $ventas=$torneos->get();
        return view('ventas-inicio',["ventas"=>$ventas,"productos"=>$productos]);

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
      if ($request->hasFile('imagen')) {
        // Get image file
                $image = $request->file('imagen');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('nombre_producto')).'_'.time();

                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $producto->imagen = $filePath;
            }
            if ($request->hasFile('imagenfondo')) {
              // Get image file
                      $image = $request->file('imagenfondo');
                      // Make a image name based on user name and current timestamp
                      $name = Str::slug($request->input('nombre_producto')).'fondo_'.time();

                      // Define folder path
                      $folder = '/uploads/images/';
                      // Make a file path where image will be stored [ folder path + file name + file extension]
                      $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                      // Upload image
                      $this->uploadOne($image, $folder, 'public', $name);
                      // Set user profile image path in database to filePath
                      $producto->imagen_fondo = $filePath;
                  }
                  $producto->activo=1;
                  $producto->save();



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
           if ($request->hasFile('imagenfondo')) {
             // Get image file
                     $image = $request->file('imagenfondo');
                     // Make a image name based on user name and current timestamp
                     $name = Str::slug($request->input('nombre_producto')).'fondo_'.time();

                     // Define folder path
                     $folder = '/uploads/images/';
                     $this->deleteOne($folder,'public',$producto->imagen_fondo );
                     // Make a file path where image will be stored [ folder path + file name + file extension]
                     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                     // Upload image
                     $this->uploadOne($image, $folder, 'public', $name);
                     // Set user profile image path in database to filePath
                     $producto->imagen_fondo = $filePath;
                 }
                 $producto->save();
    return Redirect::to('/indexproducto');
}

  public function eliminarproducto(Request $request,$id)
  {
    $producto=Producto::where('idproducto',$id)->take(1)->first();
    $producto->activo=0;
    $producto->save();
    return Redirect::to('/indexproducto');
  }


//Membresia
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

    public function actualizarmembresia(Request $request)
    {
        $torneos=DB::table('cliente as c')
        ->where('c.activo','=','1');

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
        ->select('u.id as idempleado','u.name as nombre','r.description as tipo','u.email','r.id as role','u.activo');
        $torneos=$torneos->get();
        return view('trabajador-inicio',["empleado"=>$torneos]);

    }
    public function edittrabajador(Request $request,$id)
    {
        $torneos=DB::table('users as u')
        ->join('role_user as ru','u.id','=','ru.user_id')
        ->join('roles as r','ru.role_id','=','r.id')
        ->select('u.id','u.name as nombre','u.password','r.id as role','u.email')
        ->where('u.id','=',$id)->take(1)->first();

        return view('ActualizarTrabajador',["empleado"=>$torneos]);

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
      $users->activo=1;
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
    public function actualizartrabajador(Request $request,$id)
    {
      $reglas=[
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'password' => ['required', 'string', 'min:8'],
      ];
      $datos=['name'=>$request->get('name'),
              'email'=>$request->get('email'),
              'password'=>$request->get('password'),];

      $validator=Validator::make($datos,$reglas);
      if ( $validator->fails() ) {
        return Redirect::to('/editartrabajador/'.$id)
          ->withErrors($validator);
    }
      $users= Users::where('id','=',$id)->take(1)->first();
      $users->name=$request->get('name');
      $users->email=$request->get('email');
      $users->password=Hash::make($request->get('password'));
      $users->save();

      $UserRole= UserRole::where('user_id','=',$id)->take(1)->first();;
      $torneos=DB::table('roles as r')
      ->select('r.id')
      ->where('r.name','=',$request->get('tipo'))
      ->take(1)->first();
      $UserRole->role_id=$torneos->id;
      $UserRole->save();

      return Redirect::to('/indextrabajador');
    }
    public function eliminarempleado(Request $request,$id)
    {
        $torneos=DB::table('users as u')
        ->where('u.id','=',$id)
        ->update(array('activo'=>0,'email'=>""));

        return Redirect::to('/indextrabajador');

    }

    //corte
    public function corte(Request $request)
    {$totalIngresos=0;
      $totalefectivo=0;
      $totaltarjeta=0;
      if($request->get('tipocorte')=="0")
      { $fecha=$request->get('fecha');

         if($request->get('categoria')=="0")
          {
            $torneos=DB::table('venta as v')
            ->join('users as u','v.idusuario','=','u.id')
            ->select('v.idventa as idventa','u.name as idusuario','v.total','v.fecha_venta as fecha_venta','v.metodo_pago as metodo_pago')
            ->where('fecha_venta','=',$fecha)
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->total;

                foreach ($torneos as $venta)
                if($venta->metodo_pago==1)
                    $totalefectivo+=$venta->total;

                    foreach ($torneos as $venta)
                    if($venta->metodo_pago==2)
                        $totaltarjeta+=$venta->total;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta];
            return PDF::loadView('corte', $data)->stream('corte.pdf');

            //return view('corte',["venta"=>$torneos,"fecha"=>$fecha]);
          }
          else {
            $torneos=DB::table('venta as v')
            ->join('users as u','v.idusuario','=','u.id')
            ->join('detalle_venta as dv','dv.idventa','=','v.idventa')
            ->join('producto as p','p.idproducto','=','dv.idproducto')
            ->select('v.idventa as idventa','u.name as idusuario','p.nombre as nombreproducto','dv.cantidad as cantidadventa'
                      ,'dv.monto as montoventa','v.fecha_venta as fecha_venta','v.fecha_venta','v.metodo_pago as metodopago')
            ->where('p.categoria','=',$request->get('categoria'))
            ->where('fecha_venta','=',$fecha)
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->montoventa;

                foreach ($torneos as $venta)
                if($venta->metodopago==1)
                    $totalefectivo+=$venta->montoventa;

                    foreach ($torneos as $venta)
                    if($venta->metodopago==2)
                        $totaltarjeta+=$venta->montoventa;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta];
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
              $torneos=DB::table('venta as v')
              ->join('users as u','v.idusuario','=','u.id')
              ->select('v.idventa as idventa','u.name as idusuario','v.total','v.fecha_venta as fecha_venta','v.metodo_pago as metodo_pago')
              ->whereBetween('fecha_venta',[$fechainicio,$fechafinal])
              ->get();
              foreach ($torneos as $venta)
                  $totalIngresos+=$venta->total;

                  foreach ($torneos as $venta)
                  if($venta->metodo_pago==1)
                      $totalefectivo+=$venta->total;

                      foreach ($torneos as $venta)
                      if($venta->metodo_pago==2)
                          $totaltarjeta+=$venta->total;


              $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta];
              return PDF::loadView('corte', $data)->stream('corte.pdf');
            }
         else
          {
            $torneos=DB::table('venta as v')
            ->join('users as u','v.idusuario','=','u.id')
            ->join('detalle_venta as dv','dv.idventa','=','v.idventa')
            ->join('producto as p','p.idproducto','=','dv.idproducto')
            ->select('v.idventa as idventa','u.name as idusuario','p.nombre as nombreproducto','dv.cantidad as cantidadventa'
                      ,'dv.monto as montoventa','v.fecha_venta as fecha_venta','v.fecha_venta','v.metodo_pago as metodopago')
            ->where('p.categoria','=',$request->get('categoria'))
            ->whereBetween('fecha_venta',[$fechainicio,$fechafinal])
            ->get();

            foreach ($torneos as $venta)
                $totalIngresos+=$venta->montoventa;

                foreach ($torneos as $venta)
                if($venta->metodopago==1)
                    $totalefectivo+=$venta->montoventa;

                    foreach ($torneos as $venta)
                    if($venta->metodopago==2)
                        $totaltarjeta+=$venta->montoventa;


            $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta];
            return PDF::loadView('cortecategoria', $data)->stream('corte.pdf');
        }
    }

    }

    public function impresionTicket()
    {
      $torneos=DB::table('detalle_venta as dv')
      ->select('v.nombreComprador as NombreCliente','p.nombre as nombre','dv.cantidad','dv.monto')
      ->join('producto as p','p.idproducto','=','dv.idproducto')
      ->join('venta as v','v.idventa','=','dv.idventa')
      ->where('dv.idventa','=',request('id'))
      ->get();
      $totalIngresos=0;
      foreach ($torneos as $venta)
          $totalIngresos+=$venta->monto;
      return view('Ticket',['producto'=>$torneos,'totalventa'=>$totalIngresos,'idVenta'=>request('id')]);
    }
    public function impresionResponsiva()
    {

      return view('Ticketresponsiva');
    }


}
?>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Cliente;
use App\Models\Tarjeta;
use App\Models\Producto;
use App\Models\Users;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministracionController extends Controller
{

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


    $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
    request()->imagen->move(public_path('images'), $imageName);

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
    $producto->save();

    $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
    request()->imagen->move(public_path('images'), $imageName);
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
}
?>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Cliente;
use App\Models\Tarjeta;

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
      $cliente->direccion=$request->get('domicilio_cliente');
      $cliente->telefono=$request->get('telefono_cliente');
      $cliente->fecha_nac=$request->get('fecha_nacimiento');
      $cliente->fecha_reg=$request->get('fecha_registro');
      $cliente->sexo=$request->get('sexo_cliente');
      $cliente->activo=1;
      $cliente->save();
      return Redirect::to('/registrocliente');
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
    public function registrotrabajador(Request $request)
    {

       return view("RegistroTrabajador");
    }
    public function registroproducto(Request $request)
    {

       return view("RegistroProducto");
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
    public function indexproducto(Request $request)
    {
        $torneos=DB::table('producto as c')
        ->select('c.idproducto','c.nombre','c.cantidad','c.precio','c.categoria');
        $torneos=$torneos->get();
        return view('categoria-inicio',["producto"=>$torneos]);

    }
    public function registromembresia(Request $request)
    {

       return view("RegistroMembresia");
    }
}
?>

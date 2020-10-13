<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use PDF;
use DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use App\User;
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

class AdministracionApi extends Controller
{
    use UploadTrait;
    public function registrarcompra(){
      $tarjeta=Tarjeta::where('idtarjeta',request('idtarjeta'))->take(1)->first();
      $total=request('total');
      if($total>=$tarjeta->fondo_disponible)
       return response()->json(['status'=>'fondo insuficiente']);


        $idVenta=Venta::create([
            'idcliente'=>0,
            'fecha_venta'=>date('Y-m-d H:i:s'),
            'idusuario'=>request('idusuario'),
            'metodo_pago'=>'3',
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
                    return response()->json(['error'=>true,
                            'mensaje'=>'Cantidad insuficiente en el stock de '.$key['nombre']]);
                }
            }

        }
        $tarjeta->fondo_disponible=$tarjeta->fondo_disponible-request('total');
        $tarjeta->save();
        return response()->json(['status'=>'ok'], 200);
    }



    public function indexproducto(Request $request)
    {
        $torneos=DB::table('producto as c')
        ->select('c.idproducto','c.nombre','c.cantidad','c.precio','c.categoria')
        ->where('c.activo','=','1');
        $torneos=$torneos->get();
        return response()->json(['status'=>'ok','data'=>$torneos], 200);

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
        return response()->json(['status'=>'ok','dataventas'=>$ventas,'dataproductos'=>$productos], 200);


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
        return response()->json(['status'=>'ok','data'=>$torneos], 200);

    }

    public function actualizarmembresia(Request $request)
    {
      $producto=Tarjeta::where('idtarjeta',request('idtarjeta'))->take(1)->first();
      $producto->fondo_disponible=$producto->fondo_disponible+request('fondocomprado');
      $producto->save();


        return response()->json(['status'=>'ok'], 200);

    }

    public function eliminartarjeta(Request $request,$id){
      $tarjeta=Tarjeta::where('idtarjeta',$id)->take(1)->first();
      $tarjeta->activo=0;
      $tarjeta->save();
      return Redirect::to('/indexmembresia');
    }


  //corte
  public function corte(Request $request)
  {$totalIngresos=0;
    $totalefectivo=0;
    $totaltarjeta=0;
    $totalpase=0;
    if($request->get('tipocorte')=="0")
    { $fecha=$request->get('fecha');

       if($request->get('categoria')=="0")
        {
          $torneos=DB::table('venta as v')
          ->join('users as u','v.idusuario','=','u.id')
          ->select('v.idventa as idventa','u.name as idusuario','v.total','v.fecha_venta as fecha_venta','v.metodo_pago as metodo_pago')
          ->where('fecha_venta','>=',$fecha)
          ->where('fecha_venta','<',$fecha.' 23:59:59')
          ->where('v.activo','=','1')
          ->get();

          foreach ($torneos as $venta)
              $totalIngresos+=$venta->total;

              foreach ($torneos as $venta)
              if($venta->metodo_pago==1)
                  $totalefectivo+=$venta->total;

                  foreach ($torneos as $venta)
                  if($venta->metodo_pago==2)
                      $totaltarjeta+=$venta->total;


                      foreach ($torneos as $venta)
                      if($venta->metodo_pago==3)
                          $totalpase+=$venta->total;


                      $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta,
                    "totalpase"=>$totalpase];
          return PDF::loadView('corteapp', $data)->stream('corte'.$fecha.'.pdf');

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
          ->where('fecha_venta','>=',$fecha)
          ->where('fecha_venta','<',$fecha.' 23:59:59')
          ->where('v.activo','=','1')
          ->get();

          foreach ($torneos as $venta)
              $totalIngresos+=$venta->montoventa;

              foreach ($torneos as $venta)
              if($venta->metodopago==1)
                  $totalefectivo+=$venta->montoventa;

                  foreach ($torneos as $venta)
                  if($venta->metodopago==2)
                      $totaltarjeta+=$venta->montoventa;

                      foreach ($torneos as $venta)
                      if($venta->metodopago==3)
                          $totalpase+=$venta->montoventa;


                      $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta,
                    "totalpase"=>$totalpase];
          return PDF::loadView('cortecategoriaapp', $data)->stream('corteapp'.$fecha.'.pdf');
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
            ->whereBetween('fecha_venta',[$fechainicio,$fechafinal.' 23:59:59'])
            ->where('v.activo','=','1')
            ->get();
            foreach ($torneos as $venta)
                $totalIngresos+=$venta->total;

                foreach ($torneos as $venta)
                if($venta->metodo_pago==1)
                    $totalefectivo+=$venta->total;

                    foreach ($torneos as $venta)
                    if($venta->metodo_pago==2)
                        $totaltarjeta+=$venta->total;

                        foreach ($torneos as $venta)
                        if($venta->metodo_pago==3)
                            $totalpase+=$venta->total;

                        $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta,
                      "totalpase"=>$totalpase];
            return PDF::loadView('corteapp', $data)->stream('corte'.$fechainicio.'/'.$fechafinal.'.pdf');
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
          ->whereBetween('fecha_venta',[$fechainicio,$fechafinal.' 23:59:59'])
          ->where('v.activo','=','1')
          ->get();

          foreach ($torneos as $venta)
              $totalIngresos+=$venta->montoventa;

              foreach ($torneos as $venta)
              if($venta->metodopago==1)
                  $totalefectivo+=$venta->montoventa;

                  foreach ($torneos as $venta)
                  if($venta->metodopago==2)
                      $totaltarjeta+=$venta->montoventa;

                      foreach ($torneos as $venta)
                      if($venta->metodopago==3)
                          $totalpase+=$venta->montoventa;

          $data=["venta"=>$torneos,"fecha"=>$fecha,"totalIngresos"=>$totalIngresos,"totalefectivo"=>$totalefectivo,"totaltarjeta"=>$totaltarjeta,
        "totalpase"=>$totalpase];
          return PDF::loadView('cortecategoriaapp', $data)->stream('corte'.$fechainicio.'/'.$fechafinal.'.pdf');
      }
  }

  }

    public function autenticar(Request $request)
    {
      //$user = User::where('email', '=', request('email'))->first();
      $user=DB::table('users as u')
      ->join('role_user as ru','u.id','=','ru.user_id')
      ->join('roles as r','ru.role_id','=','r.id')
      ->select('u.id','u.password','r.id as role')
      ->where('u.email','=',request('email'))->take(1)->first();//get db User data
      if(Hash::check(request('password'), $user->password)) {
        if($user->role==2)
        return response()->json(['status'=>'Unauthorized','mensaje'=>'Usuario sin privilegios'], 401);
        else
        return response()->json(['status'=>'ok','idusuario'=>$user->id], 200);


      }
      else {
        return response()->json(['status'=>'Unauthorized','mensaje'=>'Contraseña Incorrecta'], 401);
      }
    }
    public function verificartarjeta(Request $request)
    {
      $tarjeta = Tarjeta::where('idtarjeta', '=', request('idtarjeta'))->first();   //get db User data

      if($tarjeta!=null) {

        return response()->json(['status'=>'ok','data'=>$tarjeta], 200);


      }
      else {
        return response()->json(['status'=>'No existe'], 401);
      }
    }

    public function abonartarjeta(Request $request)
    {
      $tarjeta = Tarjeta::where('idtarjeta', '=', request('idtarjeta'))->first();   //get db User data

      if($tarjeta!=null) {
        $tarjeta->fondo_disponible=$tarjeta->fondo_disponible+request('monto');
        $tarjeta->save();
        return response()->json(['status'=>'ok','data'=>$tarjeta], 200);


      }
      else {
        return response()->json(['status'=>'Tarjeta no valida'], 401);
      }
    }
    public function cobrartarjeta(Request $request)
    {
      $tarjeta = Tarjeta::where('idtarjeta', '=', request('idtarjeta'))->first();   //get db User data
      if($tarjeta!=null) {
        if($tarjeta->fondo_disponible>=request('monto'))
        {
          $tarjeta->fondo_disponible=$tarjeta->fondo_disponible-request('monto');
          $tarjeta->save();
          return response()->json(['status'=>'ok','data'=>$tarjeta], 200);

        }
        else{
          return response()->json(['status'=>'Fondos Insuficientes'], 401);
        }

      }
      else {
        return response()->json(['status'=>'Tarjeta no valida'], 401);
      }
    }

    public function creartarjeta (Request $request)
    {
      $tarjeta= new Tarjeta;
      $tarjeta->idtarjeta=request('idtarjeta');
      $tarjeta->tipo=request('tipo');
      $tarjeta->fondo_disponible=0;
      $tarjeta->extra=0;
      $tarjeta->activo=1;
      $tarjeta->save();
      return response()->json(['status'=>'ok','data'=>$tarjeta], 200);
    }
    public function eliminartarjeta(Request $request){
      $tarjeta=Tarjeta::where('idtarjeta',request('idtarjeta'))->take(1)->first();
      $tarjeta->activo=0;
      $tarjeta->save();
      return response()->json(['status'=>'ok'], 200);
    }
}
?>

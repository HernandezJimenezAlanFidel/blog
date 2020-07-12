<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use DB;
class InicioController extends Controller
{
    public function index(Request $request)
    {
       /*if($request->user==null)
       {  //if($request->user->hasRole('admin'))

            return Redirect::to('/login');
          /*  else {
              if($request->user->hasRole('vendedor'))
                return view("indexvendedor");
            }*/

       if($request->user()!=null)
       {  $torneos=DB::table('producto as c')
       ->select('c.idproducto','c.nombre','c.cantidad','c.precio','c.categoria','c.imagen');
       $torneos=$torneos->get();
         if($request->user()->hasRole('admin'))
              return view('index',["producto"=>$torneos]);
              else {
                if($request->user()->hasRole('vendedor'))
                  return view('indexvendedor',["producto"=>$torneos]);
              }
      }
      else
       return Redirect::to('/login');
    }
    public function categorias(Request $request)
    {

       return view("categorias");
    }
    public function prueba(Request $request)
    {

       return view("advanced");
    }
    public function cortecaja(Request $request)
    {

       return view("cortecaja");
    }
    public function recargas(Request $request)
    {

       return view("recargas");
    }
    public function base(Request $request)
    {

       return view("layouts/base");
    }
}
?>

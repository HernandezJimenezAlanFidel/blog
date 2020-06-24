<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index(Request $request)
    {
       /*if(Auth::check())
       return view("index3");
       else
       {
         return redirect('/login');
       }*/
       $request->user()->authorizeRoles('admin');
       return view("index3");
    }
    public function categorias(Request $request)
    {

       return view("categorias");
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

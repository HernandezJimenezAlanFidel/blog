<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(Request $request)
    {

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
    public function base(Request $request)
    {

       return view("layouts/base");
    }
}
?>

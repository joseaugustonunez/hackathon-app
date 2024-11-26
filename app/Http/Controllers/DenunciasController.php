<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DenunciasController extends Controller
{
    public function index(){
        return view("denuncias.mostrar");
    }
    public function registro(){
        return view("denuncias.registrar");
    }
}

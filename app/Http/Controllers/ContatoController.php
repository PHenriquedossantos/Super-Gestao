<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function store(){
        var_dump($_GET);
        return view('site.contato');
    }
}

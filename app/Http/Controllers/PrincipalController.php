<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function store(){

        $motivo_contatos = MotivoContato::all();
        // dd($motivo_contatos);
        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}

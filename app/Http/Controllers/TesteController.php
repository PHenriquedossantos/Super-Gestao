<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function store(int $p1, int $p2){
        //echo "Soma de $p1 + $p2 é: ".($p1+$p2);
        //return view('site.teste', ['x' => $p1, 'y' => $p2]);
        return view('site.teste')->with('p1', $p1);
    }
}

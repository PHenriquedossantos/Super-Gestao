<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos'=>$motivo_contatos]);
    }
    public function store(Request $request){
        
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.email' => 'O email informado não é válido',
            'mensagem.max'=> 'A mensagem deve ter no máximo 2 mil caracteres'

        ];
        $request->validate($regras, $feedback);
    
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}

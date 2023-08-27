<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = $request->get('erro');
        return view('site.login', ['titulo' => 'login', 'erro'=> $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (email) é obrigatorio',
            'senha.required' => 'O campo usuário (email) é obrigatorio',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        
        if(isset($usuario->name)){
            echo "Usuario existe";
        } else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}

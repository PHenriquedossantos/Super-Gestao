<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        if($request->get('erro')){
            $erro = 'Usuário e ou senha não existe';
        }

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
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            

        } else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}

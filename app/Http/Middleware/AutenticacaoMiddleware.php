<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        //return $next($request);
        echo $metodo_autenticacao.' - ' . $perfil . '<br>';

        if($metodo_autenticacao == 'padrao'){
            echo 'verifica usuario e senha no banco'. $perfil .'<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'verifica usuario e senha no AD'. $perfil .'<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }

        if(false){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticacao!!!');
        }
        
    }
}

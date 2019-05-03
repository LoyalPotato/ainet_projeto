<?php

namespace App\Http\Middleware;

use Closure;
use \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Support\Facades\Auth;

class SocioAtivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* 
    Verifica se o utilizador pode-se autenticar e se esta ativo
    se sim: 
        passa á frente
    se nao:
        logout desse user
        e throw exception
    */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->ativo == 1){
            return $next($request);
        }
        Auth::logout();
        throw new UnauthorizedHttpException("Utilizador nao esta ativo");
        
    }
}

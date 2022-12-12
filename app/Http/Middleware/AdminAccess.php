<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if (Auth::check()) {
            if (Auth::user()->tipo_usuario_id == 1) {
                return $next($request);
            } else {
                return [
                    'message' => 'Você não tem permissões suficientes!'
                ];
            }
        } else {

            return [
                'message' => 'Você não está autenticado!'
            ];
        }
    }
}

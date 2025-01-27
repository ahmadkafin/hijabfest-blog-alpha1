<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LockPageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('password_enter') === true){
            return $next($request);
        }
        return redirect()->back()->with('message', 'Kamu tidak bisa mengakses halaman ini jika tidak memasukan password');
    }
}

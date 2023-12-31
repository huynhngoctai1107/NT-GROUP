<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class LogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         session()->put('resetPage',url()->previous()) ;

        if(Auth::check())
        {
                return $next($request);
        }else{
            return redirect()->route('login')->with('error-login','Xin vui lòng đăng nhập để tiếp tục');

        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        session()->put('resetPage', Route::getFacadeRoot()->current()->uri()) ;
        if(Auth::check())
        { 
            if(Auth::user()->status == 1 ){
                if(Auth::user()->id_role != 3   ){
                    return $next($request);
                    }else{
                        return redirect()->route('account');
                    }
            }else{
                Auth::logout();
                return redirect()->route('login')->with('error-login',
                'Tài khoản đang tạm khóa. Xin vui lòng liên hệ admin để được xử lí sớm nhất ! ');

            }
           
        }else{
            return redirect()->route('login')->with('error-login','Xin vui lòng đăng nhập để tiếp tục');

        }
        
    }
}

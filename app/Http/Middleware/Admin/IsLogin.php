<?php

namespace App\Http\Middleware\Admin;

use Closure;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('user')){
            if(session('user')->auth==2){
                return redirect('/lists');
            }
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请先登录');
        }

    }
}

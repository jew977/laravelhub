<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Auth;
class PermissionManager
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
       if (!Auth::check()) {
            Session::flash('msg', '请先登录');
            return redirect('auth/login');
        }
        return $next($request);
    }
}
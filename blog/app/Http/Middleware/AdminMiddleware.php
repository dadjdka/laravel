<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Admin\EntryController;
use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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
        

        if (!Auth::guard('admin')->check()) {
            //跳转
            return redirect('/admin/login');
        }
        
        return $next($request);
    }
}

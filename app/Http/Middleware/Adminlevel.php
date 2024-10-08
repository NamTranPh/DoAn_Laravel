<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Adminlevel
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            
            if ($admin->level === 1) {
                return $next($request); 
            } else {
                return redirect('/admin/error'); 
            }
        } else {
            return redirect('/admin/login'); 
        }
    }
}

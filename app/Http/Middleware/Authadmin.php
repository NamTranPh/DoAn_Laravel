<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authadmin extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        } else { 
            return redirect()->route('/admin/login');
        }
    
        
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminTeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        
        if (session()->get('role_id') == 1 && session()->get('status') == 1){
            return $next($request);
        }elseif (session()->get('role_id') == 2 && session()->get('status') == 1){
            return $next($request);
        }else{
            return redirect(route('login'));
        }
            
    }
}



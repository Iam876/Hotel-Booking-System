<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class adminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleMiddleware): Response
    {   Log::info('User role: ' . $request->user()->role);
        if($request->user()->role !== $roleMiddleware){
            // return redirect('dashboard');
            return $request->user()->role === 'admin' ? redirect('/admin/dashboard') : redirect('dashboard');

        }
        return $next($request);
    }
}

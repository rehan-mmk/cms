<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {

        if (!Auth()->user() && !in_array($request->route()->getName(), ['RegisterView', 'register', 'LoginView', 'login', 'EmailView', 'EmailPassword', 'ResetView', 'ResetPassword'])) {
            return redirect()->back();
        }
        
        if (Auth()->user() && in_array($request->route()->getName(), ['RegisterView', 'register', 'LoginView', 'login', 'EmailView', 'EmailPassword', 'ResetView', 'ResetPassword'])) {
            return redirect()->back();
        }
        
 
        return $next($request);

        
        // abort(401); //Unauthorized
    }
}

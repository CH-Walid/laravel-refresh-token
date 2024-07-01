<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransformCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cookieValue = $request->cookie('refresh_token');
        $request->headers->set('Authorization', 'Bearer 46|R2Gx41iYNr8phX8Y5KVgkMquHzR7BIrBqplFRUF51e265cf5');

        return $next($request);
    }
}

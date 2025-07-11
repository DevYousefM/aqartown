<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $nonce = bin2hex(random_bytes(16));

        $request->attributes->set('csp_nonce', $nonce);

        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        $response->headers->set('X-Content-Type-Options', 'nosniff');

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        $response->headers->set('X-XSS-Protection', '1; mode=block');

        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        $response->headers->set('Content-Security-Policy', "script-src 'self' 'nonce-$nonce'");

        $response->headers->set('Permissions-Policy', 'geolocation=(self), microphone=(), camera=(), fullscreen=(self)');

        return $response;
    }
}

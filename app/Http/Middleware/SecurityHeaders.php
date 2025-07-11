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

        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        $response->headers->set('X-Content-Type-Options', 'nosniff');

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        $response->headers->set('X-XSS-Protection', '1; mode=block');

        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        $response->headers->set('Content-Security-Policy', "
            default-src 'self';
            script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.googletagmanager.com https://connect.facebook.net https://cdnjs.cloudflare.com https://www.googleadservices.com https://googleads.g.doubleclick.net https://www.google-analytics.com;
            style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;
            font-src 'self' https://fonts.gstatic.com data:;
            img-src 'self' data: https://www.google-analytics.com https://www.googleadservices.com https://www.googletagmanager.com https://connect.facebook.net;
            connect-src 'self' https://www.google-analytics.com https://www.googleadservices.com https://googleads.g.doubleclick.net;
            frame-src 'self' https://td.doubleclick.net;
        ");
        $response->headers->set('Permissions-Policy', 'geolocation=(self), microphone=(), camera=(), fullscreen=(self)');

        return $response;
    }
}

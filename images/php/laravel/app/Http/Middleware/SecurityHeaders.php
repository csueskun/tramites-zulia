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

        // Content-Security-Policy (CSP)
        // Adjust these rules based on your app requirements
        $csp = "default-src 'self'; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net; " .
               "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://use.fontawesome.com https://fonts.googleapis.com; " .
               "font-src 'self' data: https://cdn.www.gov.co https://use.fontawesome.com https://fonts.gstatic.com; " .
               "img-src 'self' data: https://www.nortedesantander.gov.co; " .
               "frame-src 'self' https://www.youtube.com; " .
               "connect-src 'self';";
        $response->headers->set('Content-Security-Policy', $csp);

        // X-Content-Type-Options
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // X-Frame-Options
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // X-XSS-Protection
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Strict-Transport-Security (HSTS) - Only in production
        if (config('app.env') === 'production') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // Referrer-Policy
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        // Permissions-Policy (Replaced Feature-Policy)
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), browsing-topics=()');

        return $response;
    }
}

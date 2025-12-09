<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class ContentSecurityPolicy
{
    public function handle($request, Closure $next)
    {
        // 1. Generate a random nonce
        $nonce = base64_encode(random_bytes(16));

        // 2. Share it with all Blade views
        View::share('cspNonce', $nonce);

        // 3. Continue the request
        $response = $next($request);

        // 4. Set CSP header including nonce
        $csp = "default-src 'self'; "
             . "script-src 'self' 'nonce-$nonce'; "
             . "style-src 'self' 'nonce-$nonce'; "
             . "img-src 'self' data:; "
             . "connect-src 'self'; "
             . "font-src 'self' https://fonts.gstatic.com; ";

        // 5. Add CSP header to response
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}

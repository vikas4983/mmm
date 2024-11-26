<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMobileNumberUpdatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip redirect if the current route is already 'mobile.verification'
        if ($request->routeIs('mobile.verification')) {
            return $next($request);
        }

        // Check if mobile verification status is pending in the session
        if (session()->get('mobileVerification') == 'pending') {
            return redirect()->route('mobile.verification')->with('message', 'Please verify your mobile number.');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (null === auth()->user() || null === auth()->user()->employer) {
            return redirect()->route('employer.create')
                ->with('error', 'You need company first!');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class LogVisitorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $visitor = new Visitor;
        $visitor->ip_address = $request->ip();
        $visitor->save();

        return $next($request);
    }
}

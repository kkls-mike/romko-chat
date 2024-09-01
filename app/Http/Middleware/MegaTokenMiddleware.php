<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MegaTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->query('_token') !== 'a1605454104a5ae324e07db059bc9594ef1e6180'){
            abort(403);
        }

        return $next($request);
    }
}

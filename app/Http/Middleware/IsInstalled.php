<?php

namespace Opencycle\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class IsInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Schema::hasTable('users')) {
            return response('Please run migrations.', 500);
        }

        return $next($request);
    }
}

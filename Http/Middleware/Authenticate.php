<?php

namespace Modules\Frontend\Http\Middleware;

use Closure;

class Authenticate extends \App\Http\Middleware\Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        $authorized = $this->authenticate($request, $guards);

        if (!$authorized) {
            return response(['status' => 'Unauthorizeddd'], 401);
        }

        return $next($request);
    }
}

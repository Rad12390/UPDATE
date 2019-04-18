<?php

namespace SocialNet\Http\Middleware;

use Closure;

class CheckUser
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
        echo "<pre>";
        echo "dsjkfjsdkljfklds";die();
        return $next($request);
    }
}

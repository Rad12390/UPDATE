<?php

namespace SocialNet\Http\Middleware;


use Closure;
use DB;

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
        $matchThese = ['id' => '1', 'role_id' => '1'];

        /* $titles = DB::table('users')->where($matchThese)->first();
print_r($titles);*/

       //  die();
        return $next($request);
    }
}

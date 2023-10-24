<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class AdminMiddleware
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
        $user=Auth::user();
        foreach ($user -> roles as $roles) {
            if($role->name=='admin'){
                return $next($request);
            }else{
                abort(404);
            }
            # code...
        }
        return $next($request);
    }
}

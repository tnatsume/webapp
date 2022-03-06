<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserKbn
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
        $user = Auth::user();
        if($user->user_kbn == 0){
            return $user
        }else if($user->user_kbn == 11){

        } else if($user->user_kbn == 99){

        }else{
            abort(404);
        }
        return $next($request);
    }
}

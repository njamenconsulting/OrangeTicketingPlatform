<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Retrieve logged user
        $user =$request->user();
        //Get all roles of this user
        $roles = $user->roles;
        //
        foreach ($roles as $role){
            if($role->name == 'Admin'){
                return $next($request);
            }
        }
        return abort(404);
    }
}

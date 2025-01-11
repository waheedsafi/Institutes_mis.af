<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class editormiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
      $role= Auth::user()->role;
      $access = //DB::table('roles')->select('access_level')->where('id',$role)->get();
       Role::select('access_level')->where('id', $role)->get()->first();

        $access=$access['access_level'];
        if (Auth::check() && $access == 2 ){
            return $next($request);

        }else{
            return redirect()->route('welcome');

  
    }
}
}
<?php

namespace App\Http\Middleware;

use view;
use Closure;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission)
    {
        $permissionId = Permission::where('slag', $permission)->value('id');

        $roleid = Auth::user()->role;
        $role = Role::find($roleid);
        
       
        
        if ($role && $permissionId) {
            $hasPermission = $role->permissions()
                ->where('permission_id', $permissionId)
                ->exists();
  
            if ($hasPermission) {
                return $next($request);
            }
        }

        // Handle the case where the user does not have the required permission
        // return redirect('/unauthorize');
        if($request->ajax()){
        return response()->json([ 
            'unauthorize' => 'unauthorize'
    
                ],403);
            
            }
          
          
                return abort(403, 'Unauthorized');
            }

           
    }


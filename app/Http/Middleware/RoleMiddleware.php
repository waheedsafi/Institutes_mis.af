<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Http\Models\Role_permission;

class RoleMiddleware
{
   
              


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle($request, Closure $next, $role, $permission = null)
    // {
    //     if(!$request->user()->hasRole($role)) {
    //          abort(404);
    //     }

    //     if($permission !== null && !$request->user()->can($permission)) {
    //           abort(404);
    //     }

    //     return $next($request);
    // }

    // public function handle($request, Closure $next, $permission)
    // {
    //     $role = Auth::user()->role;
    //     // $role = DB::table('users')->where('id', $userId)->value('role');

    //     $permissionId = DB::table('permissions')->where('slag', $permission)->value('id');

    //     if ($role && $permissionId) {
         
    //         $hasPermission = DB::table('roles')
    //             ->join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
    //             ->where('roles.id', $role)
    //             ->where('role_permissions.per_id', $permissionId)
    //             ->exists();
          
    //         if ($hasPermission) {
    //             return $next($request);
    //         }
    //     }

    //     // Handle the case where the user does not have the required permission
    //     return abort(403, 'Unauthorized');
    // }
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
        return abort(403, 'Unauthorized');
    }
}

      




<?php

namespace App\Permissions;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

trait HasPermissionsTrait {

    public function hasPermissionTo($permission) {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return false;
        }

        // Retrieve the permission ID by slug
        $permissionId = Permission::where('slag', $permission)->value('id');

        // Check if the permission ID exists and the user has a role
        if (!$permissionId || !$this->role) {
            return false;
        }

        // Retrieve the user's role
        $role = Role::find($this->role);

        // Check if the role and permission exist, and the user has the permission
        if ($role && $permissionId) {
            $hasPermission = $role->permissions()
                ->where('permission_id', $permissionId)
                ->exists();

            return $hasPermission;
        }

        // Return false if any condition fails
        return false;
    }
}

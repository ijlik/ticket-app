<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SyncRbacRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RbacController extends Controller
{
    public function sync(SyncRbacRequest $request)
    {
        $role = Role::find($request['roleId']);

        if ($request['assign']) {
            $role->givePermissionTo($request['permissionId']);
        } else {
            $role->revokePermissionTo($request['permissionId']);
        }

        return [
            'data' => null
        ];
    }

    public function destroyPermission(Request $request, $roleId, $permissionId)
    {
        
        $permission = \App\Models\Permission::find($permissionId);

        if ($permission) {
    
            \App\Models\Role::whereHas('permissions', function ($query) use ($permissionId) {
                $query->where('id', $permissionId);
            })->each(function ($role) use ($permissionId) {
                $role->permissions()->detach($permissionId);
            });

            $permission->delete();
        }

        return ['data' => null];
    }



}
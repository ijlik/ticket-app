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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(StoreRoleRequest $request)
    {
        $newRole = Role::create(['name' => $request['role']]);

        return RoleResource::make($newRole);
    }

    public function destroy(DestroyRoleRequest $request, Role $role)
    {
        $role->delete();

        return [
            'data' => null
        ];
    }
}

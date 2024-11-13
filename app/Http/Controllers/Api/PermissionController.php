<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function store(StorePermissionRequest $request)
    {
        $newPermission = Permission::create(['name' => $request['permission']]);

        return PermissionResource::make($newPermission);
    }
}

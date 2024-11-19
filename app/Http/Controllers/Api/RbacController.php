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

    public function destroyPermission(Request $request)
    {
        $roleId = $request->input('roleId');
        $permissionId = $request->input('permissionId');
    
        // Temukan role berdasarkan ID
        $role = Role::find($roleId);
    
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    
        // Hapus permission dari role
        $role->permissions()->detach($permissionId);
    
        return response()->json(['success' => true, 'message' => 'Permission berhasil dihapus']);
    }

}
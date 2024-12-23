<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\RbacController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/rbac/role', [RoleController::class, 'store'])->name('api.rbac.store');
Route::post('/rbac/sync', [RbacController::class, 'sync'])->name('api.rbac.sync');
Route::delete('/rbac/role/{role}', [RoleController::class, 'destroy'])->name('api.rbac.destroy');
Route::post('/rbac/permission', [PermissionController::class, 'store'])->name('api.rbac.store_permission');
Route::delete('/rbac/permission/{roleId}/{permissionId}', [RbacController::class, 'destroyPermission'])->name('api.rbac.destroy_permission');

Route::post('/event/search/database', [EventController::class, 'searchDatabase']);
Route::post('/event/search/meilisearch', [EventController::class, 'searchMeilisearch']);

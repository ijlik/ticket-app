<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = Cache::remember('users', 3600, function () {
            $users = User::orderBy('name', 'DESC')->take(50)->get();
            $data = [];

            foreach ($users as $user) {
                $data[] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];
            }

            return $data;
        });

        return response()->json($users);
    }
}

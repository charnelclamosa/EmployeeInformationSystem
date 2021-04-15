<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        return User::select(
            'users.id',
            'users.name',
            'users.username',
            'users.role_code',
            'users.deleted_at',
            'roles.role_name',
        )
        ->join('roles', 'roles.id', 'users.role_code')
        ->get();
    }

    public function store(Request $request) {
        $validator = Validator::make($request->user, [
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'roleId' => 'required|integer'
        ]);
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 422);
        }
        $user = new User;
        $user->name = $request->user['name'];
        $user->username = $request->user['username'];
        $user->password = Hash::make($request->user['password']);
        $user->role_code = $request->user['roleId'];
        $user->updated_by = $request->updated_by;
        $user->save();
        return response()->json(['message' => 'New user has been created.'], 201);
    }
}

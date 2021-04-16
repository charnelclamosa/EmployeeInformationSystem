<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        return User::withTrashed()->select(
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

    public function duplicate($username) {
        $user = User::where('username', $username)->get();
        if(!$user) return;
        return response($user);
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
        $user->updated_by = $request->updatedBy;
        $user->save();
        return response()->json(['message' => 'New user has been created.'], 201);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->user['name'],
            'username' => $request->user['username'],
            'role_code' => $request->user['role_code'],
            'updated_by' => $request->updatedBy
        ]);
        return response()->json(['message' => 'User has been updated.'], 200);
    }

    public function password(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'Password' => Hash::make($request->newPassword),
            'updated_by' => $request->updatedBy
        ]);
        return response()->json(['message' => 'Update password successful.'], 200);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete($user->all());
        return response()->json(['message' => 'Delete successful.'], 200);
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore($user->all());
        return response()->json(['message' => 'Restore successful.'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthenticationController extends Controller
{
    use ThrottlesLogins;
    protected $maxAttempts = 5;
    protected $decayMinutes = 1;
    public function username()
    {
        return 'message';
    }
    public function login(Request $request) {
        $user = User::where('username', $request->username)->first();
        if($user && Hash::check($request->password, $user->password)) {
            $this->clearLoginAttempts($request);
            $token = $user->createToken($user->username)->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user], 201);
        }
        if($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockOutEvent($request);
            return $this->sendLockOutResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return response()->json(['message' => 'User does not exists.'], 404);
    }
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successful.'], 200);
    }
}

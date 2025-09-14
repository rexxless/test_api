<?php

namespace app\Http\Services;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class AuthService
{
    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
        return $token;
    }

    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return false;
        } return $token;
    }

    public function logout()
    {
        # do nothing

    }
}

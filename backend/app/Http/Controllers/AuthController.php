<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use app\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request, AuthService $service)
    {
        return response()->json(['access_token' => $service->register($request)]);
    }

    public function login(LoginUserRequest $request, AuthService $service)
    {
        $token = $service->login($request);
        if (! $token)
        {
            return response()->json(['error' => 'Неверный логин или пароль.'], 401);
        } return  response()->json(['access_token' => $token]);
    }

    public function logout(AuthService $service)
    {
       $service->logout();

       return response()->json(['message'=> 'Вы успешно вышли из аккаунта.']);
    }

}

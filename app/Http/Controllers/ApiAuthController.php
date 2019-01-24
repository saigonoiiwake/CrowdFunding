<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    //
    function login() 
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => 'bearer ' . $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
}

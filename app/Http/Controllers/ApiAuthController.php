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

        if (!$token = auth("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => 'bearer ' . $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth("api")->factory()->getTTL() * 60,
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $token = $userSocial->token;
        $refreshToken = $userSocial->refreshToken; // not always provided
        $expiresIn = $userSocial->expiresIn;

        DB::beginTransaction();
        try {

            $data = [
                'nick_name' => $userSocial->getName(),
                'email'     => $userSocial->getEmail(),
                'avatar'    => $userSocial->getAvatar(),
                'password'  => bcrypt(123456),
            ];

            $findUser = User::where('email', $userSocial->getEmail())->first();

            if ($findUser) {
                \Auth::login($findUser);
            } else {
                User::newUser($data);
                $newUser = User::where('email', $userSocial->getEmail())->first();
                \Auth::login($newUser);
                DB::commit();
            }


            return $this->respondWithToken($token);

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}

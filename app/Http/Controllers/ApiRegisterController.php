<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\User;

class ApiRegisterController extends Controller
{
    
    protected function register(Request $request)
    {
        $this->validate($request, [
            'nick_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'nick_name' => $request->nick_name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password)
            ];
           
            User::newUser($data);
            $newUser = User::where('email', $request->email)->first();
            \Auth::login($newUser);
            DB::commit();
            $jwtoken = JWTAuth::fromUser($newUser);

            return $this->respondWithToken($jwtoken);
        }
        catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

     // jwt
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => 'bearer ' . $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth("api")->factory()->getTTL() * 60,
        ]);
    }


}

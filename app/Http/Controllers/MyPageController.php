<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MyPageController extends Controller
{
    //

    public function ListAllPackages()
    {
        // 13-mypage

        $user_id = 999999999; // to-do: wait for auth

        $user = User::findOrFail($user_id);

        return response()->json([
            'status' => 'success',
            'data' => $user->sponsor_history()->get()
        ]);

    }

    public function EditAbout($request)
    {

    }

    public function EditAccount()
    {

    }

}

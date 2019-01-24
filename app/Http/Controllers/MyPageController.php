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
        $uid = auth()->user()->id;
        $user = User::findOrFail($uid);
        $my_packages = $user->sponsor_history()->get();

        return response()->json([
            'status' => 'success',
            'data' => $my_packages
        ]);

    }

    public function EditAbout(Request $request)
    {
        $this->validate($request, [
            'about_me' => 'required'
        ]);    
        
        $uid = auth()->user()->id;
        $user = User::findOrFail($uid);
        $user->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);

    }

    public function EditAccount()
    {

    }

}

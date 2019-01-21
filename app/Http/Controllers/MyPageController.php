<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    //

    public function ListAllPackages()
    {
        // 13-mypage
        return response()->json([
            'id' => 1,
            'my_packages' => [
                '1' => [
                    'project_id' => 1,
                    'package_id' => 2,
                    'price' => 1000,
                    'sold' => 7,
                    'content' => 'kiss'
                ],
                '2' => [
                    'project_id' => 2,
                    'package_id' => 1,
                    'price' => 7000,
                    'sold' => 7,
                    'content' => 'kiss'
                ],
                '3' => [
                    'project_id' => 3,
                    'package_id' => 2,
                    'price' => 7000,
                    'sold' => 7,
                    'content' => 'kiss'
                ],
                '4' => [
                    'project_id' => 4,
                    'package_id' => 2,
                    'price' => 8000,
                    'sold' => 7,
                    'content' => 'kiss'
                ],
            ],
        ]);
    }

    public function EditAccount()
    {
        return response()->json([
            'id' => 1,
            'user_id' => 123456789,
            'pwd' => 1234,
            'avatar' => 'cloudinary.com',
            'about_me' => 'asdsadsadsaasd',
        ]);
    }

}

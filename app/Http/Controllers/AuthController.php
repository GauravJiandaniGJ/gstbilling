<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{

    public function authenticate(Request $request)
    {

        $credentials = $request->only('email','password');

        try{

            if( ! $token = \JWTAuth::attempt($credentials) ){
                return Helper::apiError("User Credentials are not Correct!",null,404);
            }

        }catch (JWTException $err) {


            Helper::apiError("Something went wrong!",null,500);

        }

        return response()->json(compact('token'));

    }

    public function checkAuthentication()
    {

        $token = \JWTAuth::getToken();

        $user = \JWTAuth::toUser($token);

        return $user;

    }


   }

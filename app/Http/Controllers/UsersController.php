<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {

        $users = User::all();

        if(!$users)
        {

            return Helper::apiError("Can't fetch User!",null,404);

        }

        return $users;

    }

    public function createUser(Request $request)
    {
        $input = $request->only('name', 'email', 'password', 'role');

        $check_if_user_exist = User::where('email',$input['email'])->first();

        if(sizeof($check_if_user_exist)!=0)
        {

            return Helper::apiError("User already Exist!",null,404);

        }

        $user = User::create($input);

        if(!$user)
        {

            return Helper::apiError("Can't create User!",null,404);

        }

        return $user;

    }

    public function updateUser(Request $request, $user_id)
    {

        $input = $request->only('name');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $user = User::where('id',$user_id)->first();

        if(!$user)
        {

            return Helper::apiError("User not found!",null,404);

        }

        $user->update($input);

        return $user;

    }

    public function show($user_id)
    {

        $user = User::where('id',$user_id)->first();

        if(!$user)
        {

            return Helper::apiError("User not found!",null,404);

        }

        return $user;

    }

    public function destroy($user_id)
    {

        $user = User::where('id',$user_id)->first();

        if(!$user)
        {

            return Helper::apiError("User not found!",null,404);

        }

        $user->delete();

        return response("",204);

    }

}

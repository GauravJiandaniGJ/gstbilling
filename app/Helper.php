<?php

namespace App;

use App\Http\Requests\Request;

class Helper extends Request
{

    public static function apiError($message='',$content=null,$code=500){

        $error = ['error'=>true,'message'=>$message];

        if(!is_null($message)){
            $error['content'] = $content;
        }

        return response($error,$code);
    }

}
<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Shortcut;
use Illuminate\Http\Request;

class ShortcutController extends Controller
{

    public function create(Request $request)
    {

        $input = $request->only('description', 'price');

        $shortcut = Shortcut::create($input);

        if(!$shortcut)
        {

            return Helper::apiError("Can't create Shortcut!",null,404);

        }

    }

    public function index()
    {

        $shortcuts = Shortcut::all();

        if(!$shortcuts)
        {
            return Helper::apiError("Can't fetch shortcuts!",null,404);
        }

        return $shortcuts;

    }

}

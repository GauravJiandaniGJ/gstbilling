<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Shortcut;
use Illuminate\Http\Request;

class ShortcutController extends Controller
{

    public function create(Request $request)
    {

        $input = $request->only('description', 'price', 'type');

        $shortcut = Shortcut::create($input);

        if(!$shortcut)
        {

            return Helper::apiError("Can't create Shortcut!",null,404);

        }

        return $shortcut;

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

    public function stateList()
    {
        $list = array('Andra Pradesh', 'Arunachal Pradesh','Andra Pradesh', 'Arunachal Pradesh',
            'Assam', 'Bihar','Chhattisgarh', 'Goa',
            'Gujarat', 'Haryana','Himachal Pradesh', 'Jammu & Kashmir',
            'Jharkhand', 'Karnataka','Kerala', 'Madhya Pradesh',
            'Maharashtra', 'Manipur','Meghalaya', 'Mizoram',
            'Nagaland', 'Odisha (Orissa)','Punjab', 'Rajasthan',
            'Sikkim', 'Tamil Nadu','Telangana', 'Tripura',
            'Uttar Pradesh', 'Uttarakhand','West Bengal'
            );

        return $list;

    }

}

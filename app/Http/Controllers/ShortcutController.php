<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Shortcut;
use Illuminate\Http\Request;

class ShortcutController extends Controller
{

    public function index()
    {
        $shortcuts = Shortcut::all();

        if(!$shortcuts)
        {
            return Helper::apiError("Not found!",null,404);
        }

        return $shortcuts;
    }

    public function create(Request $request)
    {

        $input = $request->only('description', 'price', 'service_code');

        $shortcut = Shortcut::create($input);

        if(!$shortcut)
        {

            return Helper::apiError("Can't create Shortcut!",null,404);

        }

        return $shortcut;

    }

    public function update(Request $request, $sid)
    {

        $input = $request->only('description', 'price', 'service_code');

        $shortcut = Shortcut::where('id',$sid)->first();

        if(!$shortcut)
        {

            return Helper::apiError("Can't find Shortcut!",null,404);

        }

        $shortcut->update($input);

        return $shortcut;

    }

    public function delete($sid)
    {

        $shortcut = Shortcut::where('id',$sid)->first();

        if(!$shortcut)
        {

            return Helper::apiError("Can't find Shortcut!",null,404);

        }

        $shortcut->delete();

        return response("",204);

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

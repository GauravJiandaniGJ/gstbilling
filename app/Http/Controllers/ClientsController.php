<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientAddress;
use App\Helper;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function index()
    {

        $clients = Client::all();

        if(!$clients)
        {

            return Helper::apiError("Can't fetch Clients!",null,404);

        }

        return $clients;

    }

    public function create(Request $request)
    {

        $input = $request->only('name');

        $client = Client::create($input);

        if(!$client)
        {

            return Helper::apiError("Can't create Client!",null,404);

        }

        return $client;

    }

    public function createAddress(Request $request, $client_id)
    {

        $input = $request->only('address','gstin','state');

        $input['client_id'] = $client_id;

        $client_address = ClientAddress::create($input);

        if(!$client_address)
        {

            return Helper::apiError("Can't create Client Address!",null,404);

        }

        return $client_address;

    }

    public function getAddresses($client_id)
    {

        $client = ClientAddress::where('client_id',$client_id)->get();

        if(!$client)
        {

            return Helper::apiError("Address not found!",null,404);

        }

        return $client;

    }

    public function updateClientAddress(Request $request, $client_id)
    {

        $input = $request->only('address', 'gstin', 'state');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $client = ClientAddress::where('client_id',$client_id)->where('gstin',$input['gstin'])->first();

        if(!$client)
        {

            return Helper::apiError("Client not found!",null,404);

        }

        $client->update($input);

        return $client;

    }

    public function show($client_id)
    {

        $client = Client::where('id',$client_id)->first();

        if(!$client)
        {

            return Helper::apiError("Client not found!",null,404);

        }

        return $client;

    }


    public function destroy($client_id)
    {

        $client = Client::where('id',$client_id)->first();

        if(!$client)
        {

            return Helper::apiError("Client not found!",null,404);

        }

        $client->delete();

        return response("",204);

    }

}

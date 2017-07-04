<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientAddress;
use App\Helper;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function index($company_id)
    {

        $clients = Client::where('company_id',$company_id)->get();

        if(!$clients)
        {

            return Helper::apiError("Can't fetch Clients!",null,404);

        }

        return $clients;

    }

    public function updateName(Request $request, $client_id)
    {

        $input = $request->only('name');

        $client = Client::where('id',$client_id)->first();

        if(!$client)
        {

            return Helper::apiError("Client not found!",null,404);

        }

        $client->update($input);

        return $client;

    }

    public function create(Request $request, $company_id)
    {

        $input = $request->only('name');

        $input_for_address = $request->only('address','gstin','state');

        $input['company_id'] = $company_id;

        $client = Client::create($input);

        if(!$client)
        {

            return Helper::apiError("Can't create Client!",null,404);

        }

        $input_for_address['client_id'] = $client['id'];

        $client_address = ClientAddress::create($input_for_address);

        if(!$client_address)
        {

            return Helper::apiError("Can't create Client Address!",null,404);

        }

        return response(array('client'=>$client,'client_address',$client_address),200);

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

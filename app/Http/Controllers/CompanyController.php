<?php

namespace App\Http\Controllers;

use App\Company;
use App\Helper;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {

        $companies = Company::all();

        if(!$companies)
        {

            return Helper::apiError("Can't fetch company!",null,404);

        }

        return $companies;

    }

    public function create(Request $request)
    {

        $input = $request->only('name', 'address', 'gstin', 'state', 'short_name', 'username', 'password');

        $check_if_company_exits = Company::where('name',$input['name'])->where('gstin',$input['gstin'])->first();

        if(sizeof($check_if_company_exits)!=0)
        {

            return $check_if_company_exits;

        }

        $input['password'] = bcrypt($input['password']);

        $company = Company::create($input);

        if(!$company)
        {

            return Helper::apiError("Can't create Company!",null,404);

        }

        return $company;

    }

    public function updateCompany(Request $request, $user_id)
    {

        $input = $request->only('name', 'address', 'gstin', 'state', 'short_name');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $company = Company::where('id',$user_id)->first();

        if(!$company)
        {

            return Helper::apiError("User not found!",null,404);

        }

        $company->update($input);

        return $company;

    }

    public function show($user_id)
    {

        $company = Company::where('id',$user_id)->first();

        if(!$company)
        {

            return Helper::apiError("Company not found!",null,404);

        }

        return $company;

    }


    public function destroy($user_id)
    {

        $company = Company::where('id',$user_id)->first();

        if(!$company)
        {

            return Helper::apiError("Company not found!",null,404);

        }

        $company->delete();

        return response("",204);

    }


}

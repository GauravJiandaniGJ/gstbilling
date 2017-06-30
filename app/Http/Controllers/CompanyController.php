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

        $company = Company::create($input);

        if(!$company)
        {

            return Helper::apiError("Can't create Company!",null,404);

        }

        return $company;

    }

    public function updateCompany(Request $request, $company_id)
    {

        $input = $request->only('name', 'address', 'gstin', 'state', 'short_name');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $company = Company::where('id',$company_id)->first();

        if(!$company)
        {

            return Helper::apiError("User not found!",null,404);

        }

        $company->update($input);

        return $company;

    }

    public function show($company_id)
    {

        $company = Company::where('id',$company_id)->first();

        if(!$company)
        {

            return Helper::apiError("Company not found!",null,404);

        }

        return $company;

    }


    public function destroy($company_id)
    {

        $company = Company::where('id',$company_id)->first();

        if(!$company)
        {

            return Helper::apiError("Company not found!",null,404);

        }

        $company->delete();

        return response("",204);

    }

    public function authenticate(Request $request, $company_id)
    {

        $input = $request->only('username','password');

        $company = Company::where('id', $company_id)->first();

        if(!$company)
        {

            return Helper::apiError("Company not found!",null,404);

        }

        if(strcmp($company['username'] , $input['username'] )&& strcmp($company['password'] , $input['password'] ))
        {

            return response(array('status' => true), 200);

        }

        return response(array('status' => false), 200);

    }


}

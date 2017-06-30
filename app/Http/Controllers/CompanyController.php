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

        $input = $request->only('name', 'address', 'gstin', 'state');

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

}

<?php

namespace App\Http\Controllers;

use App\Bank;
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

        $input = $request->only('name', 'address', 'gstin', 'short_name','username');

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

        $company = Company::with(['bank','client','client.address'])->where('id',$company_id)->first();

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

    public function addBank(Request $request, $company_id)
    {

        $input = $request->only('account_no','beneficiary_name','branch_ifsc');

        $input['company_id'] = $company_id;

        $bank = Bank::create($input);

        if(!$bank)
        {

            Helper::apiError("Can't add Bank!",null,404);

        }

        return $bank;

    }

    public function listOfBanks($company_id)
    {

        $banks = Bank::where('company_id',$company_id)->get();

        if(!$banks)
        {

            return Helper::apiError("Can't fetch banks",null,404);

        }

        return $banks;

    }

    public function deleteBank($bank_id)
    {

        $bank = Bank::where('id',$bank_id)->first();

        if(!$bank)
        {

            return Helper::apiError("Can't fetch bank!",null,404);

        }

        $bank->delete();

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

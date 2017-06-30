<?php

namespace App\Http\Controllers;

use App\FinancialYear;
use App\Helper;
use Illuminate\Http\Request;

class FinancialYearController extends Controller
{

    public function index($company_id)
    {

        $financial_years = FinancialYear::where('company_id',$company_id)->get();

        if(!$financial_years)
        {

            return Helper::apiError("Not found!",null,404);

        }

        return $financial_years;

    }

    public function createFinancialYear(Request $request, $company_id)
    {

        $input = $request->only('title');

        $input['company_id'] = $company_id;

        $financial_year = FinancialYear::create($input);

        if(!$financial_year)
        {

            return Helper::apiError("Can't create financial year",null,404);

        }

        return $financial_year;

    }

}

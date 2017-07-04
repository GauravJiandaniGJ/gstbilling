<?php

namespace App\Http\Controllers;

use App\FinancialMonth;
use App\Helper;
use Illuminate\Http\Request;

class FinancialMonthController extends Controller
{

    public function index($financial_year_id)
    {

        $financial_months = FinancialMonth::where('financial_year_id',$financial_year_id)->get();

        if(!$financial_months)
        {

            return Helper::apiError("Not found!",null,404);

        }

        return $financial_months;

    }

    public function createFinancialMonth(Request $request, $financial_year_id)
    {

        $input = $request->only('title');

        $input['financial_year_id'] = $financial_year_id;

        $financial_month = FinancialMonth::create($input);

        if(!$financial_month)
        {

            return Helper::apiError("Can't create financial month",null,404);

        }

        return $financial_month;

    }

}

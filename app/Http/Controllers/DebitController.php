<?php

namespace App\Http\Controllers;

use App\ClientAddress;
use App\DebitDetail;
use App\DebitPrimary;
use App\Helper;
use Illuminate\Http\Request;

class DebitController extends Controller
{

    public function debitList($company_id, $financial_year, $financial_month)
    {

        $list = DebitPrimary::where('company_id',$company_id)->where('financial_year',$financial_year)->where('financial_month',$financial_month)->where('status','final')->get();

        if(!$list)
        {

            return Helper::apiError("No List found!",null, 404);

        }

        return $list;

    }

    public function createNew(Request $request, $company_id, $financial_year, $financial_month)
    {

        $input = $request->only('debit_no', 'debit_date', 'description');

        $input_client = $request->only('client_id', 'gstin');

        $client_address = ClientAddress::where('client_id',$input_client['client_id'])->where('gstin',$input_client['gstin'])->first();

        if(!$client_address)
        {

            return Helper::apiError("Client Address not found!",null,404);

        }

        $input['client_address_id'] = $client_address['id'];

        $input['final_amount'] = 0;

        $input['company_id'] = $company_id;

        $input['financial_year_id'] = $financial_year;

        $input['financial_month_id'] = $financial_month;

        $input['status'] = 'edit';

        $debit_primary = DebitPrimary::create($input);

        if(!$debit_primary)
        {

            return Helper::apiError("Can't create debit primary!",null,404);

        }

        return $debit_primary;

    }

    public function updatePrimary(Request $request, $company_id, $financial_year, $financial_month)
    {

        $input_debit = $request->only('debit_no');

        $debit_no = $input_debit['debit_no'];

        $input = $request->only('debit_date', 'description');

        $input_client = $request->only('client_id', 'gstin');

        $client_address = ClientAddress::where('client_id',$input_client['client_id'])->where('gstin',$input_client['gstin'])->first();

        if(!$client_address)
        {

            return Helper::apiError("Client Address not found!",null,404);

        }

        $input['client_address_id'] = $client_address['id'];

        $debit_primary = DebitPrimary::where('debit_no',$debit_no)->first();

        if(!$debit_primary)
        {

            return Helper::apiError("Can't fetch Debit Primary!",null,404);

        }

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $debit_primary->update($input);

        return $debit_primary;

    }

    public function addDebitDetails(Request $request, $company_id, $financial_year, $financial_month,  $debit_no)
    {

        $input = $request->only('name_of_product', 'service_code', 'qty', 'rate', 'total_amount');

        $input['debit_no'] = $debit_no;

        $debit_detail = DebitDetail::create($input);

        if(!$debit_detail)
        {

            return Helper::apiError("Can't create Debit detail!",null,404);

        }

        return $debit_detail;

    }

    public function editDebitDetails(Request $request, $company_id, $financial_year, $financial_month, $debit_no, $debit_detail_no)
    {

        $input = $request->only('name_of_product', 'service_code', 'qty', 'rate', 'total_amount');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $debit_detail = DebitDetail::where('debit_no',$debit_no)->where('id',$debit_detail_no)->first();

        if(!$debit_detail)
        {

            return Helper::apiError("No Debit detail found!",null,404);

        }

        $debit_detail->update($input);

        return $debit_detail;

    }

    public function deleteDebitDetail($company_id, $financial_year, $financial_month, $debit_no, $debit_detail_no)
    {

        $debit_detail = DebitDetail::where('debit_no',$debit_no)->where('id',$debit_detail_no)->first();

        if(!$debit_detail)
        {

            return Helper::apiError("No Debit detail found!",null,404);

        }

        $debit_detail->delete();

        return response("",204);

    }

    public function calculateTotalAmount($company_id, $financial_year, $financial_month, $debit_no)
    {

        $debit_detail_amount = DebitDetail::where('debit_no',$debit_no)->pluck('total_amount');

        if(sizeof($debit_detail_amount)==0)
        {

            return Helper::apiError("Can't fetch debit detail amount",null,404);

        }

        $total_amount = array_sum($debit_detail_amount->toArray());

        $debit_primary = DebitPrimary::where('debit_no',$debit_no)->first();

        if(!$debit_primary)
        {

            return Helper::apiError("Can't fetch debit primary",null,404);

        }

        $debit_primary->update(array('final_amount' => $total_amount));

        return $debit_primary;

    }

    public function confirmBill($company_id, $financial_year, $financial_month, $debit_no)
    {

        $debit_primary = DebitPrimary::where('debit_no',$debit_no)->first();

        if(!$debit_primary)
        {

            return Helper::apiError("Can't fetch debit primary",null,404);

        }

        if($debit_primary['status'] == 'final')
        {

            return response("Already confirmed!",200);

        }

        if($debit_primary['final_amount']==0)
        {

            return response("Please Confirm Debit Details",200);

        }

        $debit_primary->update(array('status'=> 'final'));

        return $debit_primary;

    }

    public function displayAllData($company_id, $financial_year, $financial_month, $debit_no)
    {

        $debit_bill = DebitPrimary::with(['company', 'company.bank', 'client_address', 'client_address.client', 'debitDetails'])->where('debit_no',$debit_no)->first();

        if(!$debit_bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        return $debit_bill;

    }

    public function debit_no($company_id, $financial_year, $financial_month, $debit_no)
    {

        $debit_detail = DebitPrimary::with(['company'])->where('debit_no',$debit_no)->first();

        if(!$debit_detail)
        {

            return Helper::apiError("Can't fetch detail for debit no",null,404);

        }

        $company_short_name = $debit_detail['company']['short_name'];

        $year = date("Y");

        $new_year = substr($year, -2);

        $next_year = (int)$new_year + 1;

        return response(array("format" => "$company_short_name/$debit_no/$new_year-$next_year"),200);

    }

}

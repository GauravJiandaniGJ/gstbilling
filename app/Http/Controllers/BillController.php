<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\BillPrimary;
use App\ClientAddress;
use App\Company;
use App\Helper;
use Illuminate\Http\Request;

class BillController extends Controller
{

    public function billList($company_id, $financial_year, $financial_month)
    {

        $list = BillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','=','final')->get();

        if(!$list)
        {

            return Helper::apiError("No List found!",null, 404);

        }

        if(sizeof($list)==0)
        {

            return response("No Bill",200);

        }

        return $list;

    }

    public function billListPending($company_id, $financial_year, $financial_month)
    {

        $list = BillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','!=','final')->get();

        if(!$list)
        {

            return Helper::apiError("No List found!",null, 404);

        }

        if(sizeof($list)==0)
        {

            return response("No Bill",200);

        }

        return $list;

    }

    public function latestBillNo($company_id, $financial_year, $financial_month)
    {

        $list = BillPrimary::all();

        if(!$list)
        {

            return Helper::apiError("Not found",404);

        }

        $size = sizeof($list) - 1;

        return $list[$size]['bill_no'] + 1;

    }

    public function createNew(Request $request, $company_id, $financial_year, $financial_month)
    {

        $input = $request->only('bill_no', 'bill_date', 'description');

        $input_client = $request->only('client_id', 'gstin');

        $client_address = ClientAddress::where('client_id',$input_client['client_id'])->where('gstin',$input_client['gstin'])->first();

        if(!$client_address)
        {

            return Helper::apiError("Client Address not found!",null,404);

        }

        $input['client_address_id'] = $client_address['id'];

        $input['final_amount'] = 0;

        $input['after_cgst'] = 0;

        $input['after_sgst'] = 0;

        $input['after_igst'] = 0;

        $input['total_gst'] = 0;

        $input['company_id'] = $company_id;

        $input['financial_year_id'] = $financial_year;

        $input['financial_month_id'] = $financial_month;

        $input['status'] = 'edit';

        $bill_primary = BillPrimary::create($input);

        if(!$bill_primary)
        {

            return Helper::apiError("Can't create Bill primary!",null,404);

        }

        return $bill_primary;

    }

    public function updatePrimary(Request $request, $company_id, $financial_year, $financial_month)
    {

        $input_bill = $request->only('bill_no');

        $bill_no = $input_bill['bill_no'];

        $input = $request->only('bill_date', 'description');

        $input_client = $request->only('client_id', 'gstin');

        $client_address = ClientAddress::where('client_id',$input_client['client_id'])->where('gstin',$input_client['gstin'])->first();

        if(!$client_address)
        {

            return Helper::apiError("Client Address not found!",null,404);

        }

        $input['client_address_id'] = $client_address['id'];

        $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        if(!$bill_primary)
        {

            return Helper::apiError("Can't fetch Bill Primary!",null,404);

        }

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $bill_primary->update($input);

        return $bill_primary;

    }

    public function addBillDetails(Request $request, $company_id, $financial_year, $financial_month,  $bill_no)
    {

        $input = $request->only('name_of_product', 'service_code', 'qty', 'rate', 'total_amount');

        $input['bill_no'] = $bill_no;

        $bill_detail = BillDetail::create($input);

        if(!$bill_detail)
        {

            return Helper::apiError("Can't create Bill detail!",null,404);

        }

        return $bill_detail;

    }

    public function editBillDetails(Request $request, $company_id, $financial_year, $financial_month, $bill_no, $bill_detail_no)
    {

        $input = $request->only('name_of_product', 'service_code', 'qty', 'rate', 'total_amount');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        $bill_detail = BillDetail::where('bill_no',$bill_no)->where('id',$bill_detail_no)->first();

        if(!$bill_detail)
        {

            return Helper::apiError("No Bill detail found!",null,404);

        }

        $bill_detail->update($input);

        return $bill_detail;

    }

    public function deleteBillDetail($company_id, $financial_year, $financial_month, $bill_no)
    {

        $bill_detail = BillPrimary::where('bill_no',$bill_no)->first();

        $bill_details = BillDetail::where('bill_no',$bill_no)->get();

        foreach ($bill_details as $bill)
        {

            $bill->delete();

        }

        if(!$bill_detail)
        {

            return Helper::apiError("No Bill detail found!",null,404);

        }

        $bill_detail->delete();

        return response("",204);

    }

    public function calculateTotalAmount($company_id, $financial_year, $financial_month, $bill_no)
    {

        $bill_detail_amount = BillDetail::where('bill_no',$bill_no)->pluck('total_amount');

        if(sizeof($bill_detail_amount)==0)
        {

            return Helper::apiError("Can't fetch bill detail amount",null,404);

        }

        $total_amount = array_sum($bill_detail_amount->toArray());

        $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        if(!$bill_primary)
        {

            return Helper::apiError("Can't fetch bill primary",null,404);

        }

        $company = Company::where('id',$company_id)->first();

        $bill = BillPrimary::with(['client_address'])->where('bill_no',$bill_no)->first();

        if(!$company && !$bill)
        {

            return Helper::apiError("Not found!",null,404);

        }

        $client_state = $bill['client_address']['state'];

        if(strcasecmp($client_state , $company['state']) == 0)
        {

            $after_cgst_percent = 9;

            $after_sgst_percent = 9;

            $after_igst_percent = 0;

            $after_cgst = ($total_amount * $after_cgst_percent)/100;

            $after_sgst = ($total_amount * $after_sgst_percent)/100;

            $after_igst = 0;

            $total_gst = $after_cgst + $after_sgst + $after_igst;

            $bill_primary->update(array('final_amount' => $total_amount + $total_gst, 'after_cgst' => $after_cgst, 'after_sgst' => $after_sgst, 'after_igst' => $after_igst, 'total_gst' => $total_gst));

            return $bill_primary;

        }

        $after_igst_percent = 18;

        $after_cgst = 0;

        $after_sgst = 0;

        $after_igst = ($total_amount * $after_igst_percent)/100;

        $total_gst = $after_cgst + $after_sgst + $after_igst;

        $bill_primary->update(array('final_amount' => $total_amount + $total_gst, 'after_cgst' => $after_cgst, 'after_sgst' => $after_sgst, 'after_igst' => $after_igst, 'total_gst' => $total_gst));

        return $bill_primary;

    }

    public function confirmBill($company_id, $financial_year, $financial_month, $bill_no)
    {

        $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        if(!$bill_primary)
        {

            return Helper::apiError("Can't fetch bill primary",null,404);

        }

        if($bill_primary['status'] == 'final')
        {

            return response("Already confirmed!",200);

        }

        if($bill_primary['final_amount']==0)
        {

            return response("Please Confirm Bill Details",200);

        }

        $bill_primary->update(array('status'=> 'final'));

        return $bill_primary;

    }

    public function displayAllData($company_id, $financial_year, $financial_month, $bill_no)
    {

        $bill = BillPrimary::with(['company', 'company.bank', 'client_address', 'client_address.client', 'billDetails'])->where('bill_no',$bill_no)->first();

        if(!$bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        return $bill;

    }

    public function bill_no($company_id, $financial_year, $financial_month, $bill_no)
    {

        $bill_detail = BillPrimary::with(['company'])->where('bill_no',$bill_no)->first();

        if(!$bill_detail)
        {

            return Helper::apiError("Can't fetch detail for bill no",null,404);

        }

        $company_short_name = $bill_detail['company']['short_name'];

        $year = date("Y");

        $new_year = substr($year, -2);

        $next_year = (int)$new_year + 1;

        return response(array("format" => "$company_short_name/GST/$bill_no/$new_year-$next_year"),200);

    }



}

<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BGRBHRBillDetail;
use App\BGRBHRBillPrimary;
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

        if($company_id != 1)
        {

            $list = BGRBHRBillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','=','final')->get();

        }
        else
        {

            $list = BillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','=','final')->get();

        }

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

        if($company_id != 1)
        {

            $list = BGRBHRBillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','!=','final')->get();

        }
        else
        {

            $list = BillPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','!=','final')->get();

        }

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

        if($company_id != 1)
        {

            $list = BGRBHRBillPrimary::all();

        }
        else
        {

            $list = BillPrimary::all();

        }

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

        $bank = Bank::where('company_id',$company_id)->first();

        if(sizeof($bank) == 0)
        {

            $input['bank_id'] = 0;

        }
        else
        {

            $input['bank_id'] = $bank['id'];

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

        if($company_id != 1)
        {

            $bill_primary = BGRBHRBillPrimary::create($input);

        }
        else
        {

            $bill_primary = BillPrimary::create($input);

        }

        if(!$bill_primary)
        {

            return Helper::apiError("Can't create Bill primary!",null,404);

        }

        return $bill_primary;

    }

    public function updatePrimary(Request $request,$company_id, $financial_year, $financial_month, $bill_no)
    {

        $input = $request->only('bill_date', 'description', 'bank_id');

        $input_client = $request->only('client_id', 'gstin');

        if($input_client['client_id']!=null && $input_client['gstin']!=null)
        {

            $client_address = ClientAddress::where('client_id',$input_client['client_id'])->where('gstin',$input_client['gstin'])->first();

            if(!$client_address)
            {

                return Helper::apiError("Client Address not found!",null,404);

            }

            $input['client_address_id'] = $client_address['id'];

        }

        if($company_id != 1)
        {

            $bill_primary = BGRBHRBillPrimary::where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        }

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

    public function addBillDetails(Request $request,$company_id, $financial_year, $financial_month, $bill_no)
    {

        $input = $request->only('name_of_product', 'service_code', 'qty', 'rate', 'total_amount');

        $input['bill_no'] = $bill_no;

        if($company_id != 1)
        {

            $bill_detail = BGRBHRBillDetail::create($input);

        }
        else
        {

            $bill_detail = BillDetail::create($input);

        }

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

        if($company_id != 1)
        {

            $bill_detail = BGRBHRBillDetail::where('bill_no',$bill_no)->where('id',$bill_detail_no)->first();

        }
        else
        {

            $bill_detail = BillDetail::where('bill_no',$bill_no)->where('id',$bill_detail_no)->first();

        }

        if(!$bill_detail)
        {

            return Helper::apiError("No Bill detail found!",null,404);

        }

        $bill_detail->update($input);

        return $bill_detail;

    }

    public function deleteBillDetail($company_id, $financial_year, $financial_month, $bill_detail_no)
    {

        if($company_id != 1)
        {

            $bill_details = BGRBHRBillDetail::where('id',$bill_detail_no)->first();

        }
        else
        {

            $bill_details = BillDetail::where('id',$bill_detail_no)->first();

        }

        if(!$bill_details)
        {

            return Helper::apiError("No Bill detail found!",null,404);

        }

        $bill_details->delete();

        return response("",204);

    }

    public function calculateTotalAmount($company_id, $financial_year, $financial_month, $bill_no)
    {

        if($company_id != 1)
        {

            $bill_detail_amount = BGRBHRBillDetail::where('bill_no',$bill_no)->pluck('total_amount');

        }
        else
        {

            $bill_detail_amount = BillDetail::where('bill_no',$bill_no)->pluck('total_amount');

        }

        if(sizeof($bill_detail_amount)==0)
        {

            return Helper::apiError("Can't fetch bill detail amount",null,404);

        }

        $bill_detail_amount = array_filter($bill_detail_amount->toArray(), function($value){

            return $value != null;

        });

        $total_amount = array_sum($bill_detail_amount);

        if($company_id != 1)
        {

            $bill_primary = BGRBHRBillPrimary::where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        }

        if(!$bill_primary)
        {

            return Helper::apiError("Can't fetch bill primary",null,404);

        }

        $company = Company::where('id',$company_id)->first();

        if($company_id != 1)
        {

            $bill = BGRBHRBillPrimary::with(['client_address'])->where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill = BillPrimary::with(['client_address'])->where('bill_no',$bill_no)->first();

        }

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

            $after_cgst = round(($total_amount * $after_cgst_percent)/100);

            $after_sgst = round(($total_amount * $after_sgst_percent)/100);

            $after_igst = 0;

            $total_gst = round($after_cgst + $after_sgst + $after_igst);

            $bill_primary->update(array('final_amount' => $total_amount + $total_gst, 'after_cgst' => $after_cgst, 'after_sgst' => $after_sgst, 'after_igst' => $after_igst, 'total_gst' => $total_gst));

            return $bill_primary;

        }

        $after_igst_percent = 18;

        $after_cgst = 0;

        $after_sgst = 0;

        $after_igst = round(($total_amount * $after_igst_percent)/100);

        $total_gst = round($after_cgst + $after_sgst + $after_igst);

        $bill_primary->update(array('final_amount' => $total_amount + $total_gst, 'after_cgst' => $after_cgst, 'after_sgst' => $after_sgst, 'after_igst' => $after_igst, 'total_gst' => $total_gst));

        return $bill_primary;

    }

    public function confirmBill($company_id, $financial_year, $financial_month, $bill_no)
    {

        if($company_id != 1)
        {

            $bill_primary = BGRBHRBillPrimary::where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill_primary = BillPrimary::where('bill_no',$bill_no)->first();

        }

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

        if($company_id != 1)
        {

            $bill = BGRBHRBillPrimary::with(['company', 'bank','company', 'company.bank', 'client_address', 'client_address.client', 'billDetails'])->where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill = BillPrimary::with(['company', 'bank','company', 'company.bank', 'client_address', 'client_address.client', 'billDetails'])->where('bill_no',$bill_no)->first();

        }

        if(!$bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        return $bill;

    }

    public function bill_no($company_id, $financial_year, $financial_month, $bill_no)
    {

        if($company_id != 1)
        {

            $bill_detail = BGRBHRBillPrimary::with(['company'])->where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill_detail = BillPrimary::with(['company'])->where('bill_no',$bill_no)->first();

        }

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

    public function quantityTotal($company_id, $financial_year, $financial_month, $bill_no) {

        if($company_id != 1)
        {

            $qtys = BGRBHRBillDetail::where('bill_no',$bill_no)->where('qty','!=',null)->pluck('qty');

        }
        else
        {

            $qtys = BillDetail::where('bill_no',$bill_no)->where('qty','!=',null)->pluck('qty');

        }

        return array_sum($qtys->toArray());

    }

    public function amountTotal ($company_id, $financial_year, $financial_month, $bill_no) {

        if($company_id != 1)
        {

            $total_amt = BGRBHRBillDetail::where('bill_no',$bill_no)->where('total_amount','!=',null)->pluck('total_amount');

        }
        else
        {

            $total_amt = BillDetail::where('bill_no',$bill_no)->where('total_amount','!=',null)->pluck('total_amount');

        }

        return array_sum($total_amt->toArray());

    }

    public function getBillDetails ($company_id, $financial_year, $financial_month, $bill_no) {


        if($company_id != 1)
        {

            $bill_details = BGRBHRBillDetail::where('bill_no',$bill_no)->get();

        }
        else
        {

            $bill_details = BillDetail::where('bill_no',$bill_no)->get();

        }

        if(!$bill_details)
        {
            return Helper::apiError("Not found",null,404);
        }

        return $bill_details;

    }


    public function printGSTBill($company_id, $financial_year, $financial_month, $bill_no)
    {
//        $pdf = app('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();


        if($company_id != 1)
        {

            $bill = BGRBHRBillPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client'])->where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill = BillPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client'])->where('bill_no',$bill_no)->first();

        }

        if(!$bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        $bill_date = $bill['bill_date'];

        $bill['bill_date'] = implode('-', array_reverse(explode('-', $bill_date)));;



        if($company_id != 1)
        {

            $bill_detaill = BGRBHRBillPrimary::with(['company'])->where('bill_no',$bill_no)->first();

        }
        else
        {

            $bill_detaill = BillPrimary::with(['company'])->where('bill_no',$bill_no)->first();

        }

        if(!$bill_detaill)
        {

            return Helper::apiError("Can't fetch detail for bill no",null,404);

        }

        $company_short_name = $bill_detaill['company']['short_name'];

        $year = date("Y");

        $new_year = substr($year, -2);

        $next_year = (int)$new_year + 1;

        $gst = 'G';
        $bill['final_bill_no'] = "$company_short_name/$gst$bill_no/$new_year-$next_year";

        if($company_id != 1)
        {

            $bill_detail = BGRBHRBillDetail::where('bill_no',$bill_no)->where('name_of_product','!=',null)->get();

        }
        else
        {

            $bill_detail = BillDetail::where('bill_no',$bill_no)->where('name_of_product','!=',null)->get();

        }

        $bill['bill_detail'] = $bill_detail;

        $pdf = app('dompdf.wrapper');

        $i = 0;

        if($company_id != 1)
        {

            $qtys = BGRBHRBillDetail::where('bill_no',$bill_no)->where('qty','!=',null)->pluck('qty');

        }
        else
        {

            $qtys = BillDetail::where('bill_no',$bill_no)->where('qty','!=',null)->pluck('qty');

        }

        $total_qty = array_sum($qtys->toArray());

        if($company_id != 1)
        {

            $total_amt = BGRBHRBillDetail::where('bill_no',$bill_no)->where('total_amount','!=',null)->pluck('total_amount');

        }
        else
        {

            $total_amt = BillDetail::where('bill_no',$bill_no)->where('total_amount','!=',null)->pluck('total_amount');

        }

        $total_amt = array_sum($total_amt->toArray());

        $number = $bill['final_amount'];
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
            "." . $words[$point / 10] . " " .
            $words[$point = $point % 10] : '';

        if($points == '')
        {
            $in_word = $result . "Rupees only.";
        }
        else
        {
            $in_word = $result . " Rupees  " . $points . " Paise only.";
        }

        $image = public_path('signature.jpg');

        $in_words = explode(" ",$in_word);

            $pdf->loadView('debit', ['bill' => $bill, 'i' => $i, 'qty_total' => $total_qty, 'total_amount' => $total_amt, 'in_words' => $in_words, 'image'=>$image]);

            return $pdf->download('bill.pdf');

    }

}

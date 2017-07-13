<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BGRBHRDebitDetail;
use App\BGRBHRDebitPrimary;
use App\ClientAddress;
use App\Company;
use App\DebitDetail;
use App\DebitPrimary;
use App\Helper;
use Illuminate\Http\Request;

class DebitController extends Controller
{

    public function debitList($company_id, $financial_year, $financial_month)
    {

        $list = DebitPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','final')->get();

        if(!$list)
        {

            return Helper::apiError("No List found!",null, 404);

        }

        if(sizeof($list)==0)
        {

            return response("No Debit Bill",200);

        }

        return $list;

    }

    public function latestDebitNo($company_id, $financial_year, $financial_month)
    {

        if($company_id != 1)
        {

            $list = BGRBHRDebitPrimary::all();

            if(!$list)
            {

                return Helper::apiError("Not found",404);

            }

            $size = sizeof($list) - 1;

            return $list[$size]['debit_no'] + 1;

        }

        $list = DebitPrimary::all();

        if(!$list)
        {

            return Helper::apiError("Not found",404);

        }

        $size = sizeof($list) - 1;

        return $list[$size]['debit_no'] + 1;

    }

    public function debitListPending($company_id, $financial_year, $financial_month)
    {

        $list = DebitPrimary::with(['company','client_address.client'])->where('company_id',$company_id)->where('financial_year_id',$financial_year)->where('financial_month_id',$financial_month)->where('status','!=','final')->get();

        if(!$list)
        {

            return Helper::apiError("No List found!",null, 404);

        }

        if(sizeof($list)==0)
        {

            return response("No Debit Bill",200);

        }

        return $list;

    }

    public function createNew(Request $request, $company_id, $financial_year, $financial_month)
    {

        $input = $request->only('debit_no', 'debit_date', 'description');

        $input_client = $request->only('client_id', 'gstin');

        $bank = Bank::where('company_id',$company_id)->first();

        if(sizeof($bank) == 0)
        {

            $input['bank_id'] = 0;

        }
        else
        {

            $input['bank_id'] = $bank['id'];

        }

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

        if($company_id != 1)
        {

            $debit_primary = BGRBHRDebitPrimary::create($input);

            if(!$debit_primary)
            {

                return Helper::apiError("Can't create debit primary!",null,404);

            }

            return $debit_primary;

        }

        $debit_primary = DebitPrimary::create($input);

        if(!$debit_primary)
        {

            return Helper::apiError("Can't create debit primary!",null,404);

        }

        return $debit_primary;

    }

    public function updatePrimary(Request $request, $company_id, $financial_year, $financial_month, $bill_no)
    {

        $input = $request->only('debit_date', 'description', 'bank_id');

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

            $debit_primary = BGRBHRDebitPrimary::where('debit_no',$bill_no)->first();

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


        $debit_primary = DebitPrimary::where('debit_no',$bill_no)->first();

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

        $input = $request->only('name_of_product', 'qty', 'rate', 'total_amount');

        $input['debit_no'] = $debit_no;

        if($company_id != 1)
        {

            $debit_detail = BGRBHRDebitDetail::create($input);

            if(!$debit_detail)
            {

                return Helper::apiError("Can't create Debit detail!",null,404);

            }

            return $debit_detail;

        }

        $debit_detail = DebitDetail::create($input);

        if(!$debit_detail)
        {

            return Helper::apiError("Can't create Debit detail!",null,404);

        }

        return $debit_detail;

    }

    public function editDebitDetails(Request $request, $company_id, $financial_year, $financial_month,  $debit_no, $debit_detail_no)
    {

        $input = $request->only('name_of_product', 'qty', 'rate', 'total_amount');

        $input = array_filter($input, function($value){

            return $value != null;

        });

        if($company_id!=1)
        {

            $debit_detail = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('id',$debit_detail_no)->first();

            if(!$debit_detail)
            {

                return Helper::apiError("No Debit detail found!",null,404);

            }

            $debit_detail->update($input);

            return $debit_detail;

        }

        $debit_detail = DebitDetail::where('debit_no',$debit_no)->where('id',$debit_detail_no)->first();

        if(!$debit_detail)
        {

            return Helper::apiError("No Debit detail found!",null,404);

        }

        $debit_detail->update($input);

        return $debit_detail;

    }

    public function deleteDebitDetail($company_id, $financial_year, $financial_month,  $debit_detail_no)
    {

        if($company_id != 1)
        {

            $debit_detail = BGRBHRDebitDetail::where('id',$debit_detail_no)->first();

            if(!$debit_detail)
            {

                return Helper::apiError("No Bill detail found!",null,404);

            }

            $debit_detail->delete();

            return response("",204);

        }

        $debit_detail = DebitDetail::where('id',$debit_detail_no)->first();

        if(!$debit_detail)
        {

            return Helper::apiError("No Bill detail found!",null,404);

        }

        $debit_detail->delete();

        return response("",204);

    }

    public function calculateTotalAmount($company_id, $financial_year, $financial_month, $debit_no)
    {

        if($company_id != 1)
        {

            $debit_detail_amount = BGRBHRDebitDetail::where('debit_no',$debit_no)->pluck('total_amount');

        }
        else
        {

            $debit_detail_amount = DebitDetail::where('debit_no',$debit_no)->pluck('total_amount');

        }

        if(sizeof($debit_detail_amount)==0)
        {

            return Helper::apiError("Can't fetch debit detail amount",null,404);

        }

        $debit_detail_amount = array_filter($debit_detail_amount->toArray(), function($value){

            return $value != null;

        });

        $total_amount = array_sum($debit_detail_amount);

        if($company_id!=1)
        {

            $debit_primary = BGRBHRDebitPrimary::where('debit_no',$debit_no)->first();

        }
        else
        {

            $debit_primary = DebitPrimary::where('debit_no',$debit_no)->first();

        }

        if(!$debit_primary)
        {

            return Helper::apiError("Can't fetch debit primary",null,404);

        }

        $debit_primary->update(array('final_amount' => $total_amount));

        return $debit_primary;

    }

    public function confirmBill($company_id, $financial_year, $financial_month, $debit_no)
    {

        if($company_id != 1)
        {

            $debit_primary = BGRBHRDebitPrimary::where('debit_no',$debit_no)->first();

        }
        else
        {

            $debit_primary = DebitPrimary::where('debit_no',$debit_no)->first();

        }

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

        if($company_id != 1)
        {

            $debit_bill = BGRBHRDebitPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client', 'debitDetails'])->where('debit_no',$debit_no)->first();

        }
        else
        {

            $debit_bill = DebitPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client', 'debitDetails'])->where('debit_no',$debit_no)->first();

        }

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

    public function quantityTotal($company_id, $financial_year, $financial_month, $debit_no) {

        if($company_id != 1)
        {

            $qtys = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('qty','!=',null)->pluck('qty');

            return array_sum($qtys->toArray());

        }
        else
        {
            $qtys = DebitDetail::where('debit_no',$debit_no)->where('qty','!=',null)->pluck('qty');

            return array_sum($qtys->toArray());
        }

    }

    public function amountTotal ($company_id, $financial_year, $financial_month, $debit_no) {

        if($company_id != 1)
        {

            $total_amt = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('total_amount','!=',null)->pluck('total_amount');

            return array_sum($total_amt->toArray());

        }
        else
        {

            $total_amt = DebitDetail::where('debit_no',$debit_no)->where('total_amount','!=',null)->pluck('total_amount');

            return array_sum($total_amt->toArray());

        }

    }

    public function getDebitDetails ($company_id, $financial_year, $financial_month, $debit_no) {

        if($company_id != 1)
        {
            $debit_details = BGRBHRDebitDetail::where('debit_no',$debit_no)->get();
        }
        else
        {

            $debit_details = DebitDetail::where('debit_no',$debit_no)->get();

        }

        if(!$debit_details)
        {
            return Helper::apiError("Not found",null,404);
        }

        return $debit_details;

    }

    public function printDebit($company_id, $financial_year, $financial_month, $debit_no)
    {
//        $pdf = app('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();

        if($company_id != 1)
        {

            $debit_bill = BGRBHRDebitPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client'])->where('debit_no',$debit_no)->first();

        }
        else
        {

            $debit_bill = DebitPrimary::with(['company', 'bank', 'company', 'company.bank', 'client_address', 'client_address.client'])->where('debit_no',$debit_no)->first();

        }

        if(!$debit_bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        $debit_date = $debit_bill['debit_date'];

        $debit_bill['debit_date'] = implode('-', array_reverse(explode('-', $debit_date)));;


        if($company_id != 1)
        {

            $debit_detaill = BGRBHRDebitPrimary::with(['company'])->where('debit_no',$debit_no)->first();

        }
        else
        {

            $debit_detaill = DebitPrimary::with(['company'])->where('debit_no',$debit_no)->first();

        }

        if(!$debit_detaill)
        {

            return Helper::apiError("Can't fetch detail for debit no",null,404);

        }

        $company_short_name = $debit_detaill['company']['short_name'];

        $year = date("Y");

        $new_year = substr($year, -2);

        $next_year = (int)$new_year + 1;

        $debit_bill['final_debit_no'] = "$company_short_name/$debit_no";


        if($company_id != 1)
        {

            $debit_detail = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('name_of_product','!=',null)->get();

        }
        else
        {

            $debit_detail = DebitDetail::where('debit_no',$debit_no)->where('name_of_product','!=',null)->get();

        }

        $debit_bill['debit_detail'] = $debit_detail;

        $pdf = app('dompdf.wrapper');

        $i = 0;



        if($company_id != 1)
        {

            $qtys = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('qty','!=',null)->pluck('qty');

        }
        else
        {

            $qtys = DebitDetail::where('debit_no',$debit_no)->where('qty','!=',null)->pluck('qty');

        }

        $total_qty = array_sum($qtys->toArray());

        if($company_id != 1)
        {

            $total_amt = BGRBHRDebitDetail::where('debit_no',$debit_no)->where('total_amount','!=',null)->pluck('total_amount');

        }
        else
        {

            $total_amt = DebitDetail::where('debit_no',$debit_no)->where('total_amount','!=',null)->pluck('total_amount');

        }

        $total_amt = array_sum($total_amt->toArray());



        $number = $total_amt;
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
            $in_words = $result . "Rupees only.";
        }
        else
        {
            $in_words = $result . "Rupees  " . $points . " Paise only.";
        }

        $image = public_path('signature.jpg');


        if($debit_bill['company_id'] != 1)
        {

            $pdf->loadView('debit_bhr', ['debit' => $debit_bill, 'i' => $i, 'qty_total' => $total_qty, 'total_amount' => $total_amt, 'in_words' => $in_words,'image' => $image]);

            return $pdf->download('debit.pdf');

        }
        else
        {

            $pdf->loadView('debit_final', ['debit' => $debit_bill, 'i' => $i, 'qty_total' => $total_qty, 'total_amount' => $total_amt, 'in_words' => $in_words,'image' => $image]);

            return $pdf->download('debit.pdf');

        }

    }

}

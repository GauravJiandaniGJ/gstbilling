<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\BillPrimary;
use App\DebitDetail;
use App\DebitPrimary;
use App\Helper;
use Illuminate\Http\Request;

class StatementController extends Controller
{

    public function listOfStatement()
    {
        return response(array(
            1 => 'Statement',
            2 => 'Statement of debit',
            3 => 'Statement of bill',
            4 => 'Statement of total tax',
            5 => 'Statement of total tax cgst',
            6 => 'Statement of total tax sgst',
            7 => 'Statement of total tax igst'
        ),200);
    }

    public function generateStatement(Request $request)
    {

        $from_date_input = $request->only('from_date');

        $from_date = $from_date_input['from_date'];

        $from_time = strtotime($from_date);

        $from_date = date('Y-m-d',$from_time);

        $to_date_input = $request->only('to_date');

        $to_date = $to_date_input['to_date'];

        $to_time = strtotime($to_date);

        $to_date = date('Y-m-d',$to_time);

        $company_id = $request->only('company_id');

        $id_input = $request->only('id');

        $id = $id_input['id'];

        if($id == 1)
        {

            $debit = DebitPrimary::with(['company','debitDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            $debit_amt = $debit->pluck('final_amount');

            $total = array_sum($debit_amt->toArray());

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$debit && !$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $bill_amt_cgst = $bill->pluck('after_cgst');

            $total_cgst = array_sum($bill_amt_cgst->toArray());

            $bill_amt_sgst = $bill->pluck('after_sgst');

            $total_sgst = array_sum($bill_amt_sgst->toArray());

            $bill_amt_igst = $bill->pluck('after_igst');

            $total_igst = array_sum($bill_amt_igst->toArray());

            $bill_amt_gst = $bill->pluck('total_gst');

            $total_gst = array_sum($bill_amt_gst->toArray());

            return response(array('debit_details'=>$debit,'total_debit' => $total,'bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt,'total_cgst'=>$total_cgst,'total_sgst'=>$total_sgst,'total_igst'=>$total_igst,'total_gst'=>$total_gst),200);

        }

        if($id == 2)
        {

            $debit = DebitPrimary::with(['company','debitDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$debit)
            {

                return response("Not found Entry",200);

            }

            $debit_amt = $debit->pluck('final_amount');

            $total = array_sum($debit_amt->toArray());

            return response(array('debit'=>$debit,'total'=>$total),200);

        }

        if($id == 3)
        {

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $bill_amt_cgst = $bill->pluck('after_cgst');

            $total_cgst = array_sum($bill_amt_cgst->toArray());

            $bill_amt_sgst = $bill->pluck('after_sgst');

            $total_sgst = array_sum($bill_amt_sgst->toArray());

            $bill_amt_igst = $bill->pluck('after_igst');

            $total_igst = array_sum($bill_amt_igst->toArray());

            $bill_amt_gst = $bill->pluck('total_gst');

            $total_gst = array_sum($bill_amt_gst->toArray());

            return response(array('bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt,'total_cgst'=>$total_cgst,'total_sgst'=>$total_sgst,'total_igst'=>$total_igst,'total_gst'=>$total_gst),200);

        }

        if($id == 4)
        {

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt_cgst = $bill->pluck('after_cgst');

            $total_cgst = array_sum($bill_amt_cgst->toArray());

            $bill_amt_sgst = $bill->pluck('after_sgst');

            $total_sgst = array_sum($bill_amt_sgst->toArray());

            $bill_amt_igst = $bill->pluck('after_igst');

            $total_igst = array_sum($bill_amt_igst->toArray());

            $bill_amt_gst = $bill->pluck('total_gst');

            $total_gst = array_sum($bill_amt_gst->toArray());

            return response(array('bill_details'=>$bill, 'total_cgst'=>$total_cgst,'total_sgst'=>$total_sgst,'total_igst'=>$total_igst,'total_gst'=>$total_gst),200);

        }

        if($id == 5)
        {

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $bill_amt_cgst = $bill->pluck('after_cgst');

            $total_cgst = array_sum($bill_amt_cgst->toArray());

            return response(array('bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt,'total_cgst'=>$total_cgst),200);

        }

        if($id == 6)
        {

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $bill_amt_sgst = $bill->pluck('after_sgst');

            $total_sgst = array_sum($bill_amt_sgst->toArray());

            $bill_amt_gst = $bill->pluck('total_gst');

            $total_gst = array_sum($bill_amt_gst->toArray());

            return response(array('bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt,'total_sgst'=>$total_sgst,'total_gst'=>$total_gst),200);

        }

        if($id == 7)
        {

            $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $bill_amt_igst = $bill->pluck('after_igst');

            $total_igst = array_sum($bill_amt_igst->toArray());

            $bill_amt_gst = $bill->pluck('total_gst');

            $total_gst = array_sum($bill_amt_gst->toArray());

            return response(array('bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt,'total_igst'=>$total_igst,'total_gst'=>$total_gst),200);

        }

    }

    public function generateStatementPartywiseDebit(Request $request)
    {

        $from_date_input = $request->only('from_date');

        $from_date = $from_date_input['from_date'];

        $from_time = strtotime($from_date);

        $from_date = date('Y-m-d',$from_time);

        $to_date_input = $request->only('to_date');

        $to_date = $to_date_input['to_date'];

        $to_time = strtotime($to_date);

        $to_date = date('Y-m-d',$to_time);

        $company_id = $request->only('company_id');

        $client_id = $request->only('client_id');

        $debit = DebitPrimary::with(['company','debitDetails','client_address','client_address.client'=>function($q) use($client_id){
            $q->where('id','=',$client_id['client_id']);
        }])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','=','final')->get();

        if(!$debit)
        {

            return response("Not found Entry",200);

        }

        $debit_arr = [];

        $debit_amt_arr = [];

        foreach ($debit as $single)
        {

            if($single['client_address']['client_id'] == $client_id['client_id']) {

                array_push($debit_arr,$single);

                array_push($debit_amt_arr,$single['final_amount']);

            }

        }

        $total = array_sum($debit_amt_arr);

        return response(array('debit'=>$debit_arr,'total'=>$total),200);

    }

    public function generateStatementPartywiseBill(Request $request)
    {

        $from_date_input = $request->only('from_date');

        $from_date = $from_date_input['from_date'];

        $from_time = strtotime($from_date);

        $from_date = date('Y-m-d',$from_time);

        $to_date_input = $request->only('to_date');

        $to_date = $to_date_input['to_date'];

        $to_time = strtotime($to_date);

        $to_date = date('Y-m-d',$to_time);

        $company_id = $request->only('company_id');

        $client_id = $request->only('client_id');

        $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'=>function($q) use($client_id){
            $q->where('id','=',$client_id['client_id']);
        }])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','=','final')->get();

        if(!$bill)
        {

            return response("Not found Entry",200);

        }

        $bill_arr = [];

        $bill_amt_arr = [];

        $cgst = [];

        $sgst = [];

        $igst = [];

        $gst = [];

        foreach ($bill as $single)
        {

            if($single['client_address']['client_id'] == $client_id['client_id']) {

                array_push($bill_arr,$single);

                array_push($bill_amt_arr,$single['final_amount']);

                array_push($cgst,$single['after_cgst']);

                array_push($sgst,$single['after_sgst']);

                array_push($igst,$single['after_igst']);

                array_push($gst,$single['total_gst']);

            }

        }

        $total = array_sum($bill_amt_arr);

        $total_cgst = array_sum($cgst);

        $total_sgst = array_sum($sgst);

        $total_igst = array_sum($igst);

        $total_gst = array_sum($gst);

        return response(array('bill'=>$bill_arr,'bill_total_amt'=>$total,'total_cgst'=>$total_cgst,'total_igst'=>$total_igst,'total_sgst'=>$total_sgst,'total_gst'=>$total_gst),200);

    }

    public function finalDataDebit($bill_no)
    {

        $debit_bill = DebitPrimary::with(['company', 'bank', 'company', 'company', 'client_address', 'client_address.client'])->where('debit_no',$bill_no)->first();

        if(!$debit_bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        $bill_detail = DebitDetail::where('debit_no',$bill_no)->where('total_amount','!=',null)->get();

        $debit_bill['bill_detail'] = $bill_detail;

        return $debit_bill;

    }


    public function finalDataBill($bill_no)
    {

        $bill = BillPrimary::with(['company', 'bank', 'company', 'company', 'client_address', 'client_address.client'])->where('bill_no',$bill_no)->first();

        if(!$bill)
        {

            return Helper::apiError("Can't fetch data");

        }

        $bill_detail = BillDetail::where('bill_no',$bill_no)->where('total_amount','!=',null)->get();

        $bill['bill_detail'] = $bill_detail;

        return $bill;

    }

}

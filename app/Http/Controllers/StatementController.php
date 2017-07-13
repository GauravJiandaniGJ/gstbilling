<?php

namespace App\Http\Controllers;

use App\BGRBHRBillPrimary;
use App\BGRBHRDebitPrimary;
use App\BillDetail;
use App\BillPrimary;
use App\Client;
use App\DebitDetail;
use App\DebitPrimary;
use App\Helper;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;

class StatementController extends Controller
{

    public function listOfStatement()
    {
        return response(array(
            array('text' => 'Statement of Debit', 'id' => 2),
            array('text' => 'Statement of GST Bill', 'id' => 3),
            array('text' => 'Statement of Total Tax', 'id' => 4),
        ),200);
    }

    public function listOfStatementClientWise()
    {
        return response(array(
            array('text' => 'Statement of Debit', 'id' => 1),
            array('text' => 'Statement of Bill', 'id' => 2)
        ),200);

    }

    public function generateStatement($from_date, $to_date, $company, $id)
    {
        set_time_limit(180);

        $from_time = strtotime($from_date);

        $from_date = date('Y-m-d',$from_time);

        $to_time = strtotime($to_date);

        $to_date = date('Y-m-d',$to_time);

        $company_id['company_id'] = $company;

        if($id == 1)
        {

            if($company_id['company_id'] != 1)
            {

                $debit = BGRBHRDebitPrimary::with(['company','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','=','final')->get();

            }
            else
            {

                $debit = DebitPrimary::with(['company','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','=','final')->get();

            }

            $debit_amt = $debit->pluck('final_amount');

            $total = array_sum($debit_amt->toArray());

            if($company_id['company_id']!=1)
            {

                $bill = BGRBHRBillPrimary::with(['company','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }
            else
            {

                $bill = BillPrimary::with(['company','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }

            if(!$debit && !$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());

            $company_short_name = $debit[0]['company']['short_name'];

            $year = date("Y");

            $new_year = substr($year, -2);

            $next_year = (int)$new_year + 1;

            $pdf = app('dompdf.wrapper');

            $pdf->loadView('statement_entirely', ['debit_details'=>$debit,'total_debit' => $total,'bill_details'=>$bill, 'total_gst_bill_amt'=>$total_final_amt, 'short_name' => $company_short_name, 'year' => $new_year, 'next_year'=>$next_year]);

            return $pdf->download('statement_entirely.pdf');

        }

        if($id == 2)
        {

            if($company_id['company_id']!=1)
            {

                $debit = BGRBHRDebitPrimary::with(['company','debitDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }
            else
            {

                $debit = DebitPrimary::with(['company','debitDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }

            if(!$debit)
            {

                return response("Not found Entry",200);

            }

            $debit_amt = $debit->pluck('final_amount');

            $total = array_sum($debit_amt->toArray());

            $company_short_name = $debit[0]['company']['short_name'];

            $year = date("Y");

            $new_year = substr($year, -2);

            $next_year = (int)$new_year + 1;

            $pdf = app('dompdf.wrapper');

            $pdf->loadView('statement_debit', ['debit_details'=>$debit,'total_debit' => $total, 'short_name' => $company_short_name, 'year' => $new_year, 'next_year'=>$next_year]);

            return $pdf->download('statement_debit.pdf');


        }

        if($id == 3)
        {

            if($company_id['company_id']!=1)
            {

                $bill = BGRBHRDebitPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }
            else
            {

                $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }

            if(!$bill)
            {

                return response("Not found Entry",200);

            }

            $bill_amt = $bill->pluck('final_amount');

            $total_final_amt = array_sum($bill_amt->toArray());


            $company_short_name = $bill[0]['company']['short_name'];

            $year = date("Y");

            $new_year = substr($year, -2);

            $next_year = (int)$new_year + 1;

            $pdf = app('dompdf.wrapper');

            $pdf->loadView('statement_gst', ['bill_in_detail'=>$bill,'total_bill' => $total_final_amt, 'short_name' => $company_short_name, 'year' => $new_year, 'next_year'=>$next_year]);

            return $pdf->download('statement_gst.pdf');

        }

        if($id == 4)
        {

            if($company_id['company_id'] != 1)
            {

                $bill = BGRBHRBillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }
            else
            {

                $bill = BillPrimary::with(['company','billDetails','client_address','client_address.client'])->where('company_id',$company_id['company_id'])->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('status','final')->get();

            }

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


            $company_short_name = $bill[0]['company']['short_name'];

            $year = date("Y");

            $new_year = substr($year, -2);

            $next_year = (int)$new_year + 1;

            $pdf = app('dompdf.wrapper');

            $pdf->loadView('statement_total_tax', ['bill_details'=>$bill, 'total_cgst'=>$total_cgst,'total_sgst'=>$total_sgst,'total_igst'=>$total_igst,'total_gst'=>$total_gst,'short_name'=>$company_short_name,'year'=>$new_year,'next_year'=>$next_year]);

            return $pdf->download('statement_total_tax.pdf');

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

        $debit = DebitPrimary::with(['company','client_address','client_address.client'=>function($q) use($client_id){
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
return $debit_arr;
        $pdf = PDF::loadView('pdf', ['debit' => $debit_arr, 'total' => $total]);

        return $pdf->download('partywisedebit.pdf');

    }

    public function pdf()
    {
//        $clients = Client::all();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('statement_entirely');

        return $pdf->download('clients.pdf');

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

    public function buildPDF()
    {

    }

}

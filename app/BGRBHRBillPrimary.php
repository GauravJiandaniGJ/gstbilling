<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BGRBHRBillPrimary extends Model
{
    protected $table = 'bill_bgrbhr_primary';

    protected $primaryKey = 'bill_no';

    protected $fillable = [
        'bill_no', 'bill_date', 'company_id', 'client_address_id', 'bank_id', 'description', 'after_cgst', 'after_sgst', 'after_igst', 'total_gst', 'final_amount', 'financial_year_id', 'financial_month_id', 'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id');
    }

    public function client_address()
    {
        return $this->belongsTo(ClientAddress::class,'client_address_id');
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class,'bill_no');
    }

    public function financial_month()
    {
        return $this->belongsTo(FinancialMonth::class,'financial_month_id');
    }

    public function financial_year()
    {
        return $this->belongsTo(FinancialYear::class,'financial_year_id');
    }

}

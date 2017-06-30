<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPrimary extends Model
{

    protected $table = 'bills_primary';

    protected $primaryKey = 'bill_no';

    protected $fillable = [
        'bill_date', 'company_id', 'client_id', 'description', 'after_cgst', 'after_sgst', 'after_igst', 'total_gst', 'final_amount', 'financial_year_id', 'financial_month_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
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

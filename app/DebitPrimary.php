<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitPrimary extends Model
{

    protected $table = 'debit_primary';

    protected $primaryKey = 'debit_no';

    protected $fillable = [
        'debit_date', 'company_id', 'client_id', 'description', 'final_amount', 'financial_year_id', 'financial_month_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function debitDetails()
    {
        return $this->hasMany(DebitDetail::class,'debit_no');
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

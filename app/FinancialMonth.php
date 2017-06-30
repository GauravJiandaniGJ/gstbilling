<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialMonth extends Model
{

    protected $table = 'financial_months';

    protected $fillable = [
        'title', 'financial_year_id'
    ];

    public function financial_year()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }

    public function bill()
    {
        return $this->hasMany(BillPrimary::class,'financial_month_id');
    }

    public function debit()
    {
        return $this->hasMany(DebitPrimary::class,'financial_month_id');
    }

}

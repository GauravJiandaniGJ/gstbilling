<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{

    protected $table = 'financial_years';

    protected $fillable = [
      'title', 'company_id'
    ];

    public function financial_month()
    {
        return $this->hasMany(FinancialMonth::class,'financial_year_id');
    }

    public function bill()
    {
        return $this->hasMany(BillPrimary::class,'financial_year_id');
    }

    public function debit()
    {
        return $this->hasMany(DebitPrimary::class,'financial_year_id');
    }

}

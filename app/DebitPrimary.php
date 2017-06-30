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

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialMonth extends Model
{

    protected $table = 'financial_months';

    protected $fillable = [
        'title'
    ];

}

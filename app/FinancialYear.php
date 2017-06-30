<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{

    protected $table = 'financial_years';

    protected $fillable = [
      'title'
    ];

}

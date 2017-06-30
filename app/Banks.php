<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{

    protected $table = 'banks';

    protected $fillable = [
      'company_id', 'account_no', 'beneficiary_name', 'branch_ifsc'
    ];

}

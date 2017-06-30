<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    protected $table = 'banks';

    protected $fillable = [
      'company_id', 'account_no', 'beneficiary_name', 'branch_ifsc'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}

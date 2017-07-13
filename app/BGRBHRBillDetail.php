<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BGRBHRBillDetail extends Model
{

    protected $table = 'bill_bgrbhr_detail';

    protected $fillable = [
        'bill_no', 'name_of_product', 'service_code', 'qty', 'rate', 'total_amount'
    ];

    public function billPrimary()
    {
        return $this->belongsTo(BillPrimary::class,'bill_no');
    }

}

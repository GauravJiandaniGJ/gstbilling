<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{

    protected $table = 'bill_details';

    protected $fillable = [
      'bill_no', 'name_of_product', 'service_code', 'qty', 'total_amount'
    ];

    public function billPrimary()
    {
        return $this->belongsTo(BillPrimary::class,'bill_no');
    }

}

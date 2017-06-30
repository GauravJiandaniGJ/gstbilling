<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{

    protected $table = 'bill_details';

    protected $fillable = [
      'bill_no', 'name_of_product', 'service_code', 'qty', 'total_amount'
    ];

}

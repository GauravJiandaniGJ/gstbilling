<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitDetails extends Model
{

    protected $table = 'debit_details';

    protected $fillable = [
        'debit_no', 'name_of_product', 'service_code', 'qty', 'total_amount'
    ];

}

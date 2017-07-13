<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BGRBHRDebitDetail extends Model
{
    protected $table = 'debit_bgrbhr_detail';

    protected $fillable = [
        'debit_no', 'name_of_product', 'qty', 'rate', 'total_amount'
    ];

    public function debitPrimary()
    {
        return $this->belongsTo(DebitPrimary::class,'debit_no');
    }

}

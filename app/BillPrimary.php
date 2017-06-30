<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPrimary extends Model
{

    protected $table = 'bills_primary';

    protected $primaryKey = 'bill_no';

    protected $fillable = [
        'bill_date', 'company_id', 'client_id', 'description', 'after_cgst', 'after_sgst', 'after_igst', 'total_gst', 'final_amount', 'financial_year_id', 'financial_month_id'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = "companys";

    protected $fillable = [
        'name', 'address', 'gstin', 'state'
    ];

    public function bill()
    {
        return $this->hasMany(BillPrimary::class,'company_id');
    }

    public function debit()
    {
        return $this->hasMany(DebitPrimary::class,'company_id');
    }

    public function bank()
    {
        return $this->hasMany(Bank::class,'company_id');
    }

}

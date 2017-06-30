<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = "clients";

    protected $fillable = [
        'name'
    ];

    public function bill()
    {
        return $this->hasMany(BillPrimary::class,'client_id');
    }

    public function debit()
    {
        return $this->hasMany(DebitPrimary::class,'client_id');
    }

    public function address()
    {
        return $this->hasMany(ClientAddress::class,'client_id');
    }
}

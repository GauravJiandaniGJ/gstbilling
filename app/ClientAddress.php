<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{

    protected $table = "clients_address";

    protected $fillable = [
        'address', 'gstin', 'state'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

}

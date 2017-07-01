<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    protected $table = 'shortcuts';

    protected $fillable = [
      'description', 'price', 'type'
    ];
}

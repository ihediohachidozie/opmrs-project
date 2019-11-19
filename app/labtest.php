<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class labtest extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
    ];
}

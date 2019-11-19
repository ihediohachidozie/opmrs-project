<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pharmacy extends Model
{
    //
    protected $guarded = [];

    public function consultancy()
    {
        return $this->belongsTo(consultancy::class);  
    }
    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
    ];
}

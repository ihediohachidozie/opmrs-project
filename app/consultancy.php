<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultancy extends Model
{
    //
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class);  
    }
    public function pharmacy()
    {
        return $this->belongsTo(pharmacy::class);  
    }
    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
    ];
}

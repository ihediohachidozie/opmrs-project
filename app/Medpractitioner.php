<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medpractitioner extends Model
{
    //
    public function Practitioner()
    {
        return $this->belongsTo(Practitioner::class);  
    }
}

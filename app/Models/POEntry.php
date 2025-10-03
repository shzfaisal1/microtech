<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POEntry extends Model
{
    protected $guarded = [];

  
    public function PoDetails(){

        return $this->belongsTo(POEntry::class);
    }
}

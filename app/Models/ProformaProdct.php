<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProformaProdct extends Model
{
      protected $guarded =[];

public function make_data()
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function model_data()
    {
        return $this->belongsTo(ModelDetail::class,'model_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class make extends Model
{
    
    protected $guarded =[];

public function QuotationProductCalculation(){

    return $this->hasMany(QuotationProductCalculation::class,'make_id');

}
  
}

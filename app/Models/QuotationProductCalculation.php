<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationProductCalculation extends Model
{
    protected $guarded =[];

    public function make_data(){

    return $this->belongsTo(make::class,'make_id');

     }

     public function model_data()
{
    return $this->belongsTo(ModelDetail::class, 'model_id');
}

public function Quotation(){
    return $this->belongsTo(Quotation::class, 'quotation_id');

}

}

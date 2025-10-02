<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Vendor;
class VednorContactPerson extends Model
{
   protected $guarded = [];


   public function vendor(){
      return $this->belongsTo(Vendor::class,'vendor_id');
   }
}

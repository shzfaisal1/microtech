<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

     public function report_type(){
       return $this->hasOne(ReportType::class,'page_id');
    }
}

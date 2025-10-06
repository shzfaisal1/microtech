<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
class ReportType extends Model
{
     protected $fillable = [
        'report_type',
        'page_id',
        'created_by',
        'updated_by'
    ];


    public function pages(){
       return $this->hasOne(Page::class,'id');
    }
}

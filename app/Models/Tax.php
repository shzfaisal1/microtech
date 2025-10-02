<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = "tax";
     protected $fillable = [
        'tax_name',
        'tax_value',
        'status',
        'created_by',
        'updated_by'
    ];
}

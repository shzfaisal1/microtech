<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsigneeName extends Model
{
      protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];
}

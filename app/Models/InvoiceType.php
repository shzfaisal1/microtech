<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceType extends Model
{
     protected $fillable = [
        'invoice_type',
        'stamp_description',
        'unstamp_description',
        'created_by',
        'updated_by'
    ];
}

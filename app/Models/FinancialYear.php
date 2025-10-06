<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LUT;

class FinancialYear extends Model
{
    protected $guarded = [];

    public function lut()
    {
        return $this->hasOne(LUT::class, 'financial_year_id');
    }
}

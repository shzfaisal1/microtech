<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FinancialYear;
class LUT extends Model
{
    protected $table = 'lut';
    protected $guarded =[];

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AMCProduct extends Model
{
    protected $guarded = [];

    public function make_data()
    {
        return $this->belongsTo(make::class, 'make_id');
    }

    public function models()
    {
        return $this->belongsTo(ModelDetail::class,'model_id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'lst_st_qtr');
    }

    public function contract_amc()
    {
        return $this->belongsTo(ContractAMC::class, 'amc_id');
    }
}

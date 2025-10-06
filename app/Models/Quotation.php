<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $guarded =[];

    public function ClientName(){
       return  $this->belongsTo(ClientDetail::class,'client_name_id');
    }

      
public function quarter()
{
    return $this->belongsTo(Quarter::class, 'quarter_id');
}

public function clientGroup(){

    return $this->belongsTo(Client::class, 'client_group_id');

}

public function company(){

    return $this->belongsTo(CompanyDetail::class, 'company_id');

}

public function finance(){

    return $this->belongsTo(FinancialYear::class, 'fin_year_id');

}

public function product_data(){

    return $this->hasMany(QuotationProductCalculation::class,'quotation_id');

}


}
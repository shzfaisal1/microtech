<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    protected $guarded = [];

    public function company(){

        return $this->belongsTo(CompanyDetail::class,'company_id','id');
    }
     public function finance()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_id');
    }

    
    public function clientGroup()
    {
        return $this->belongsTo(Client::class, 'client_group_id');
    }

    public function clientName()
    {
        return $this->belongsTo(ClientDetail::class, 'client_name_id');
    }

    public function contactPerson()
    {
        return $this->belongsTo(ClientContactPerson::class, 'contact_person_id');
    }

    public function challan_calculation(){
        
        return $this->hasOne(ChallanCalculation::class, 'challan_id');
    }

     public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarter_id');
    }
     public function state(){
        return $this->belongsTo(StateCode::class,'state_code_id');
    }

    public function ProductSale(){
        return $this->hasMany(ChallanProductSale::class, 'challan_id');
    }
    public function outward(){
        return $this->hasMany(Outward::class, 'challan_id');
    }
    public function ChallanCalculation(){
        return $this->hasOne(ChallanCalculation::class, 'challan_id');
    }
}

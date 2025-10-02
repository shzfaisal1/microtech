<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractAMC extends Model
{
   
    protected $guarded = [] ;

// Make
public function make_data()
{
    return $this->belongsTo(Make::class, 'make_id');
}





          public function quarter()
        {
            return $this->belongsTo(Quarter::class, 'quarter_id');
        }
        
    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }


    public function company_name(){

        return $this->belongsTo(CompanyDetail::class, 'company_id');

    }

    public function finance_name(){

        return $this->belongsTo(FinancialYear::class, 'financial_id');

    }


    public function Clients_Group(){

        return $this->belongsTo(Client::class, 'client_group_id');

    }
    public function ClientsName(){
            
            return $this->belongsTo(ClientDetail::class, 'client_name_id','id');
        }


    public function contact_person(){
        
         return $this->belongsTo(ClientContactPerson::class, 'contact_person_id','id');
    }

    public function products(){

         return $this->hasMany(AMCProduct::class,'amc_id','id');
    }
}

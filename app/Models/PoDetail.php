<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoDetail extends Model
{
      protected $guarded = [];

    public function financialYear()
    {
            return $this->belongsTo(FinancialYear::class,'financial_year_id');
    }
    public function companyDetail()
    {
        return $this->belongsTo(CompanyDetail::class, 'company_id');
    }
       public function vendor(){

      return $this->belongsTo(Vendor::class,'vendor_id');
   }

    public function contactPersons(){
        
    return $this->belongsTo(VednorContactPerson::class,'contact_person_id');
    }

    public function poEntry()
    {
        return $this->hasMany(PoEntry::class, 'po_id','id'); 
    }

      public function currency(){
        
    return $this->belongsTo(Currency::class,'currency_id');
    }


}

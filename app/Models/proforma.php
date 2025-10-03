<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proforma extends Model
{
    protected $guarded =[];

    public function company(){

        return $this->belongsTo(CompanyDetail::class,'company_id','id');
    }
     public function finance()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_id');
    }

    
     public function ClientInfo()
    {
        return $this->hasOne(ProformaClientDetail::class, 'pl_id');
    }


      public function ProformaCalculation()
    {
        return $this->hasOne(ProformaCalculation::class, 'pl_id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarter_id');
    }

        public function proforma_type()
    {
        return $this->belongsTo(InvoiceType::class, 'proforma_type');
    }

    public function challan(){

    return $this->belongsTo(Challan::class,'challan_id','id');  
    }

    public function proforma_product(){

      return $this->hasMany(ProformaProdct::class,'pl_id','id');  
    }

  
    
}

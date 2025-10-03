<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inward extends Model
{
      protected $guarded = [];

        
        
  


    public function company()
    {
        return $this->belongsTo(CompanyDetail::class, 'company_id');
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

      public function products()
    {
        return $this->hasMany(InwardItem::class, 'inward_id');
    }

    

    
}

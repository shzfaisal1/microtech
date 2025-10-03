<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
   protected $table = "clients_details"; 
  protected $guarded = [];

     public function contact_details()
    {
        return $this->hasMany(ClientContactPerson::class, 'client_details_id', 'id');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'id');
    }

    public function ClientsName(){
        
         return $this->belongsTo(Client::class, 'client_name_id','id');
    }

  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProformaClientDetail extends Model
{
   protected $guarded =[];
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
}

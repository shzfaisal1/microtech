<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientContactPerson extends Model
{
   

    public function clientName()
    {      
    return $this->belongsTo(ClientDetail::class, 'client_details_id', 'id');
    }
}

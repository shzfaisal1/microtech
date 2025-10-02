<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];

    public function Client_name()
    {
        return $this->hasMany(ClientDetail::class, 'client_name_id', 'id');
    }

}

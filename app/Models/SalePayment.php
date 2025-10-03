<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    //
    protected $guarded = [];

    public function ReceiptSalePaymentDetail(){
        return $this->hasMany(ReceiptSalePaymentDetail::class,'sale_id');
    }
    public function Clients(){
        return $this->belongsTo(ClientDetail::class,'client_name_id');
    }
    public function Account(){
        return $this->belongsTo(Account::class,'account');
    }
}

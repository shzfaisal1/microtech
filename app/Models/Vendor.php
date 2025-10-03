<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VednorContactPerson;

class Vendor extends Model
{
protected $fillable = [
    'name',
    'print_name_as',
    'address',
    'phone',
    'email_id_1',
    'email_id_2',
    'web_address',
    'pan_no',
    'gst_no',
    'vat_tin_no_1',
    'vat_tin_no_2',
    'cst_tin_no_1',
    'cst_tin_no_2',
    'service_tax_no',
    'bank_name',
    'bank_add',
    'bank_account_no',
    'bank_ifsc_code',
    'bank_branch_name',
    'contact_person_name',
    'desg_person_name',
    'contact_person_email1',
    'contact_person_email2',
    'contact_person_no1',
    'contact_person_no2',
    'balance',
    'created_by',
    'updated_by',
];

    public function contactPersons(){
        
        return $this->HasMany(VednorContactPerson::class,'vendor_id');
    }

}

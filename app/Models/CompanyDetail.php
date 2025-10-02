<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $fillable = [
        'company_name',
        'contact_num',
        'contact_num1',
        'print_as',
        'print_as1',
        'company_prefix',
        'email_id',
        'email_id1',
        'address',
        'city',
        'fax',
        'country',
        'web_address',
        'state',
        'vat_tin',
        'vat_tin_date',
        'pan_no',
        'cst_tin',
        'cst_tin_date',
        'pt_no',
        'service_tax',
        'subject_jur',
        'license_no',
        'license_no1',
        'sale_invoice',
        'created_by',
        'updated_by'
    ];
}

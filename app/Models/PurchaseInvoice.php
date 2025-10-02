<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Calculation  ;
class PurchaseInvoice extends Model
{
    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    public function consignee()
    {
        return $this->belongsTo(ConsigneeName::class, 'consignee_id');
    }

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year');
    }

    public function companyDetail()
    {
        return $this->belongsTo(CompanyDetail::class, 'company_id');
    }
    public function calculation()
    {
        return $this->belongsTo(Calculation::class, 'invoice_number');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;
use App\Models\Buyer;
use App\Models\ConsigneeName;
use App\Models\FinancialYear ;
use App\Models\CompanyDetail;
use App\Models\PurchaseInvoice;

class Calculation extends Model
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
   public function purchaseInvoice()
   {
       return $this->hasMany(PurchaseInvoice::class, 'invoice_number');
   }
}

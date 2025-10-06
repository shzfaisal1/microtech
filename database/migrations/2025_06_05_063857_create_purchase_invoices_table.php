<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->id();
          
          
            $table->integer('company_id')->nullable();
            $table->integer('financial_year_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('po_number')->nullable();
            $table->date('po_date')->nullable();
            $table->date('duty_paid_date')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('consignee_id')->nullable();
            $table->date('inward_date')->nullable();
            $table->integer('vendor_id');
            $table->integer('contact_person')->nullable();
            $table->integer('currency_id')->nullable();
            $table->integer('currency_value_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('HSN_code')->nullable();
            $table->string('HSN_value')->nullable();
            $table->integer('stamp')->default(0);
            $table->string('vc_no')->nullable();
            $table->date('vc_date')->nullable();
            $table->string('condition')->nullable();
            $table->string('stock_location')->nullable();
            $table->float('price');
            $table->float('total_amount');
            $table->float('price_in_INR');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_invoices');
    }
};

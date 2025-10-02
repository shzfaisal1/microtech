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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->string('invoice_number');    
            $table->date('invoice_date');
            $table->integer('company_id')->nullable();
            $table->integer('financial_year')->nullable();
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->date('duty_paid_date')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('consignee_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->float('currency')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_perso_phone')->nullable();
            $table->date('inward_date')->nullable();
            $table->float('net_amount')->default(0);
            $table->float('packing/courier')->default(0);
            $table->float('discount')->default(0);
            $table->string('tax_type1')->nullable();
            $table->float('tax_type1_value')->default(0);
            $table->float('tax1_amount')->default(0);
            $table->string('tax_type2')->nullable();
            $table->float('tax_type2_value')->default(0);
            $table->float('tax2_amount')->default(0);
            $table->float('total')->default(0);
            $table->float('round_off')->default(0);
            $table->float('advance')->default(0);
            $table->float('payable')->default(0);
            $table->integer('quantity')->default(1);

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};

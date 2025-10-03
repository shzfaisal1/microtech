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
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 155)->nullable();
            $table->string('contact_num', 20)->nullable();
            $table->string('contact_num1', 20)->nullable();
            $table->string('print_as', 155)->nullable();
            $table->string('print_as1', 155)->nullable();
            $table->string('company_prefix', 50)->nullable();
            $table->string('email_id', 155)->nullable();
            $table->string('email_id1', 155)->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('web_address', 255)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('vat_tin', 100)->nullable();
            $table->date('vat_tin_date')->nullable();
            $table->string('pan_no', 20)->nullable();
            $table->string('cst_tin', 100)->nullable();
            $table->date('cst_tin_date')->nullable();
            $table->string('pt_no', 100)->nullable();
            $table->string('service_tax', 100)->nullable();
            $table->string('subject_jur', 255)->nullable();
            $table->string('license_no', 100)->nullable();
            $table->string('license_no1', 100)->nullable();
            $table->string('sale_invoice', 100)->nullable();
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
        Schema::dropIfExists('company_details');
    }
};

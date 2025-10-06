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
        Schema::create('clients_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('print_name');
            $table->unsignedBigInteger('client_group_id');
            $table->foreign('client_group_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('client_type_id');
            $table->foreign('client_type_id')->references('id')->on('client_types')->onDelete('cascade');
            $table->string('state');
            $table->text('address')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('gstin')->nullable();
            $table->integer('contact_no1')->nullable();
            $table->integer('contact_no2')->nullable();
            $table->integer('contact_no3')->nullable();
            $table->integer('contact_no4')->nullable();
            $table->string('email_1')->nullable();   
            $table->string('email_2')->nullable();       
            $table->string('fax')->nullable();
            $table->string('web_add')->nullable();
            $table->string('vat_tin_no')->nullable();
            $table->date('vat_tin_date')->nullable();
            $table->string('cst_tin_no')->nullable();
            $table->date('cst_tin_date')->nullable();
            $table->date('service_tax_no')->nullable();
            $table->unsignedBigInteger('related_vendor_id')->nullable();
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
        Schema::dropIfExists('clients');
    }
};

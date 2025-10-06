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
        Schema::create('po_details', function (Blueprint $table) {
            $table->id();
               $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
            ->references('id')
            ->on('company_details');

             $table->unsignedBigInteger('contact_person_id')->nullable();
             $table->foreign('contact_person_id')
              ->references('id')
              ->on('vednor_contact_people');
            $table->unsignedBigInteger('financial_year_id')->nullable();
            $table->foreign('financial_year_id')
            ->references('id')
            ->on('financial_years');
            $table->string('po_no');
            $table->date('po_date');        
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')
            ->references('id')
            ->on('vendors');    
               $table->integer('quantity');   
            $table->float('total');   
            $table->float('priceINR');
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
        Schema::dropIfExists('po_details');
    }
};

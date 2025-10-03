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
        Schema::create('vednor_contact_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vedor_id');
            $table->foreign('vedor_id')->references('id')->on('vendors');
            $table->string('name')->nullable(); 
            $table->string('designation')->nullable();  
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vednor_contact_people');
    }
};

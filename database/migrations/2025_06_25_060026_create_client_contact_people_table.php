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
        Schema::create('client_contact_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_details_id');
            $table->foreign('client_details_id')->references('id')->on('clients_details')->onDelete('cascade');
            $table->string('name');
            $table->string('designation');
            $table->integer('contact_1');
            $table->integer('contact_2');
            $table->string('email_1');
            $table->string('email_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_contact_people');
    }
};

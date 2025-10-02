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
        Schema::create('reference_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('gender');
            $table->integer('contact_number1')->nullable();
            $table->integer('contact_number2')->nullable();
            $table->string('email1')->unique();
            $table->string('email2')->unique();
            $table->date('dob');      
            $table->string('address');
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
        Schema::dropIfExists('reference_entries');
    }
};

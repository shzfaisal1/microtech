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
        Schema::create('model_attribute_values', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('model_id');
        $table->unsignedBigInteger('attribute_value_id');
        $table->foreign('model_id')->references('id')->on('model_details')->onDelete('cascade');
        $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_attribute_values');
    }
};

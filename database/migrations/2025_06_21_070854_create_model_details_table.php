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
        Schema::create('model_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('make_id')->nullable();
             $table->foreign('make_id')
            ->references('id')
            ->on('makes');
             $table->string('model_name');
             $table->string('type_of_code');
             $table->string('code');
             $table->integer('available_stock');
             $table->string('reliance_item_code');
            $table->unsignedBigInteger('attr_details_id')->nullable();
            $table->foreign('attr_details_id')
            ->references('id')
            ->on('attribute_details');
            $table->unsignedBigInteger('attr_val_id')->nullable();
            $table->foreign('attr_val_id')
            ->references('id')
            ->on('attribute_details');
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
        Schema::dropIfExists('model_details');
    }
};

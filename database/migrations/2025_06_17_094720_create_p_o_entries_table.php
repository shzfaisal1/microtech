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
        Schema::create('p_o_entries', function (Blueprint $table) {
            $table->id(); 

            $table->unsignedBigInteger('po_id')->nullable();
             $table->foreign('po_id')
             ->references('id')
            ->on('po_details')
            ->onDelete('cascade'); 

                 $table->unsignedBigInteger('make_id')->nullable();
            $table->foreign('make_id')
                ->references('id')
                ->on('makes')
                ->onDelete('cascade');      
                         
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')
                ->references('id')
                ->on('models');          
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
        Schema::dropIfExists('p_o_entries');
    }
};

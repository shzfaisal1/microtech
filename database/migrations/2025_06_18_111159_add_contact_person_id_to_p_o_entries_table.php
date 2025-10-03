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
        Schema::table('p_o_entries', function (Blueprint $table) {

        $table->unsignedBigInteger('contact_person_id')->nullable()->after('vendor_id');
        $table->foreign('contact_person_id')
              ->references('id')
              ->on('vednor_contact_people')
              ->onDelete('set null'); 
        });
    }

   
    public function down(): void
    {
                Schema::table('p_o_entries', function (Blueprint $table) {
                $table->dropForeign(['contact_person_id']);
                $table->dropColumn('contact_person_id');

        });
    }
};

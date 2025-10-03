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
        Schema::table('vendors', function (Blueprint $table) {
            if (Schema::hasColumn('vendors', 'desg_person_name')) {
                $table->dropColumn('desg_person_name');
            }
            if (Schema::hasColumn('vendors', 'contact_person_no1')) {
                $table->dropColumn('contact_person_no1');
            }
            if (Schema::hasColumn('vendors', 'contact_person_no2')) {
                $table->dropColumn('contact_person_no2');
            }
            if (Schema::hasColumn('vendors', 'contact_person_name')) {
                $table->dropColumn('contact_person_name');
            }
            if (Schema::hasColumn('vendors', 'contact_person_email1')) {
                $table->dropColumn('contact_person_email1');
            }
            if (Schema::hasColumn('vendors', 'contact_person_email2')) {
                $table->dropColumn('contact_person_email2');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('contact_person_name')->nullable();
            $table->string('desg_person_name')->nullable();
            $table->integer('contact_person_no1')->nullable();
            $table->integer('contact_person_no2')->nullable();
            $table->string('contact_person_email1')->nullable();
            $table->string('contact_person_email2')->nullable();
        });
    }
};

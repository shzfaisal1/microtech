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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('print_name_as');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_id_1')->unique()->nullable();
            $table->string('email_id_2')->unique()->nullable();
            $table->string('web_address')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('vat_tin_no_1')->nullable();
            $table->string('vat_tin_no_2')->nullable();
            $table->string('cst_tin_no_1')->nullable();
            $table->string('cst_tin_no_2')->nullable();
            $table->string('service_tax_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_add')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('desg_person_name')->nullable();
            $table->integer('contact_person_no1')->nullable();
            $table->integer('contact_person_no2')->nullable();
            $table->string('contact_person_email1')->nullable();
            $table->string('contact_person_email2')->nullable();
            $table->integer('balance')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};

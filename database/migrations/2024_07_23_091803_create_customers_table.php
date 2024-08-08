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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('sub_areas_id');
            $table->string('customer_type');
            $table->string('business_name');
            $table->string('contact_person_name');
            $table->string('customer_cnic')->unique();
            $table->string('contact_no');
            $table->string('address');
            $table->string('customer_email')->unique();
            $table->string('license_no')->unique();
            $table->date('license_expiry_date');
            $table->string('license_category');
            $table->string('tax_filer');
            $table->string('filer_type');
            $table->string('sales_tax_no');
            $table->string('ntn_no');
            $table->timestamps();

           
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('sub_areas_id')->references('id')->on('sub_areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

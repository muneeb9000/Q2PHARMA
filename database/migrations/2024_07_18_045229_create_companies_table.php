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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_type')->nullable();
            $table->string('company_email');
            $table->string('company_number');
            $table->string('company_city');
            $table->string('company_state')->nullable();
            $table->string('company_address');
            $table->string('license_no');
            $table->string('ntn_no');
            $table->string('gst_no');
            $table->date('license_issue_date');
            $table->date('license_expiry_date')->default('9999-12-31')->change();
            $table->string('ceo_name');
            $table->string('ceo_number');
            $table->string('ceo_email');
            $table->string('ceo_city');
            $table->string('ceo_address');
            $table->string('ceo_id_card');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

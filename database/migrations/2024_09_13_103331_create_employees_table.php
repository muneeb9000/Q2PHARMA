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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->date('joining_date');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('department_id');
            $table->string('qualification');
            $table->string('experience');
            $table->string('name');
            $table->enum('gender',['MALE','FEMALE']);
            $table->string('religion');
            $table->enum('blood_group',['A+','A','A-','B+','B','B-','AB+','AB-','O+','O-']);
            $table->string('dob');
            $table->string('number');
            $table->string('address');
            $table->string('email');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

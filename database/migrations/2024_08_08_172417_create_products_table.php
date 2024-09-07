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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id'); 
            $table->unsignedBigInteger('category_id');
            $table->string('code')->unique(); 
            $table->string('barcode')->nullable(); 
            $table->string('sku')->unique(); 
            $table->string('batch_number')->nullable();
            $table->integer('reorder_level')->default(0); 
            $table->string('current_stock');
            $table->string('strength')->nullable();
            $table->unsignedBigInteger('purchase_unit_id');
            $table->unsignedBigInteger('sale_unit_id');
            $table->integer('unit_ratio')->default(1); 
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->decimal('tax', 5, 2)->default(0.00);
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->text('description')->nullable(); 
            $table->enum('availability', ['in_stock', 'out_of_stock'])->default('in_stock');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('purchase_unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('sale_unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

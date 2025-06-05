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
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('batch_number')->unique();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->string('description');
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('color_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('color_id')->references('id')->on('colors');
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

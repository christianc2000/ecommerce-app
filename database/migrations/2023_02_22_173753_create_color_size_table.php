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
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();

            $table->foreignId('color_id')->references('id')->on('colors');
            $table->foreignId('size_id')->references('id')->on('sizes');
           
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_size');
    }
};

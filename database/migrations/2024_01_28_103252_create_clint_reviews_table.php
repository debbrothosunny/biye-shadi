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
        Schema::create('clint_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('sec')->nullable(); //section
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('img')->nullable();
            $table->string('alt_img')->nullable();
            $table->string('video')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clint_reviews');
    }
};

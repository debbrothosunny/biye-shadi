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
        Schema::create('family_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('father_alive')->nullable();
            $table->string('mother_alive')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('how_many_brother')->nullable();
            $table->string('brother_information')->nullable();
            $table->string('financial_status')->nullable();
            $table->string('financial_condition')->nullable();
            $table->string('religious_condition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_information');
    }
};

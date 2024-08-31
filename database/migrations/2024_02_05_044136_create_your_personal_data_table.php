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
        Schema::create('your_personal_data', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('number')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('education')->nullable();
            $table->string('proffession')->nullable();
            $table->string('religion')->nullable();
            $table->string('height')->nullable();
            $table->integer('visits')->default(0);
            $table->string('marital')->nullable();
            $table->string('children')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('complexion')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('your_personal_data');
    }
};

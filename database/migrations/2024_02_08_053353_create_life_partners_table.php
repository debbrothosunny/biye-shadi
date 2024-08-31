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
        Schema::create('life_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('age')->nullable();
            $table->string('complexion')->nullable();
            $table->string('height')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('district')->nullable();
            $table->string('getting_married')->nullable();
            $table->string('financial_condition')->nullable();
            $table->string('life_partner')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_partners');
    }
};

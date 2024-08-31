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
        Schema::create('marriage_related', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('marriage_status')->nullable();
            $table->string('agree_to_marriage')->nullable();
            $table->string('reason_divorce')->nullable();
            $table->string('after_marriage')->nullable();
            $table->string('studies_after_marriage')->nullable();
            $table->string('getting_married')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_related');
    }
};

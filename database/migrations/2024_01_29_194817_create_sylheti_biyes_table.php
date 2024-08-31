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
        Schema::create('sylheti_biyes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_1')->nullable();
            $table->string('icon_1')->nullable();
            $table->string('des_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('icon_2')->nullable();
            $table->string('des_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('icon_3')->nullable();
            $table->string('des_3')->nullable();
            $table->string('img')->nullable();
            $table->string('alt_img')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sylheti_biyes');
    }
};

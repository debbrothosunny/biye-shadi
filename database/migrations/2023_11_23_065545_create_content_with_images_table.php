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
        Schema::create('content_with_images', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('sec')->nullable(); //section
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('button_name_one')->nullable();
            $table->string('button_name_two')->nullable();
            $table->string('img')->nullable();
            $table->string('video')->nullable();
            $table->string('alt_img')->nullable();
            $table->text('des')->nullable(); //description
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_with_images');
    }
};

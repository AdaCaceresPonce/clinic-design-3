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
        Schema::create('about_us_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->string('cover_img');

            $table->text('about_us_title');
            $table->text('about_us_description');
            $table->string('about_us_img');

            $table->text('free_title_1');
            $table->text('free_description_1');
            $table->text('free_title_2')->nullable();
            $table->text('free_description_2')->nullable();
            $table->string('free_img');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_page_contents');
    }
};

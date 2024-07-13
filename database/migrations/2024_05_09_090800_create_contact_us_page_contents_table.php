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
        Schema::create('contact_us_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->string('cover_img');

            $table->text('contact_us_title');
            $table->text('contact_us_description');
            $table->string('contact_us_img');

            $table->text('opinions_title');
            $table->text('opinions_description');
            $table->string('opinions_img');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_page_contents');
    }
};

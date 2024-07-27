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
        Schema::create('welcome_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->text('cover_description');
            $table->string('cover_img');

            $table->text('about_title');
            $table->text('about_description');
            $table->text('about_we_offer_you');
            $table->string('about_image');

            $table->text('our_services_title');
            $table->text('our_services_description');

            $table->text('our_professionals_title');
            $table->text('our_professionals_description');

            $table->text('testimonials_title');
            $table->text('testimonials_description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_page_contents');
    }
};

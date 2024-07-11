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
        Schema::create('our_services_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->string('cover_img');

            $table->text('our_services_title');
            $table->text('our_services_description');
            $table->string('our_services_img');

            $table->text('services_we_offer_title');
            $table->text('services_we_offer_description');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_services_page_contents');
    }
};

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
        Schema::create('clinic_information', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('schedule');
            $table->string('email');
            $table->string('address');
            $table->string('navbar_clinic_logo');
            $table->string('footer_clinic_logo');
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_information');
    }
};

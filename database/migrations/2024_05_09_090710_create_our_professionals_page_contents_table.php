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
        Schema::create('our_professionals_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->string('cover_img');

            $table->text('our_professionals_title');
            $table->string('our_professionals_img');

            $table->text('our_professionals_team_title');
            $table->text('our_professionals_team_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_professionals_page_contents');
    }
};

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
        Schema::table('opinions', function (Blueprint $table) {
            $table->unsignedTinyInteger('rating')->default(0)->after('service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};

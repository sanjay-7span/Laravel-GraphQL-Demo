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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('capital', 120)->nullable();
            $table->string('country_code', 100)->nullable();
            $table->string('iso_3166_2', 200)->nullable();
            $table->string('iso_3166_3', 200)->nullable();
            $table->string('name', 200);
            $table->string('region_code', 200)->nullable();
            $table->string('flag', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

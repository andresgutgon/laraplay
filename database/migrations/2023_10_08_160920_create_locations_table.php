<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            // Optional
            $table->string('display_name')->nullable();
            $table->string('road')->nullable();
            $table->string('house_number')->nullable();
            $table->string('state')->nullable();
            $table->string('state_district')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('locations');
    }
};

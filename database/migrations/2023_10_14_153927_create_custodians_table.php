<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('custodians', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->unsignedBigInteger('member_id');
            $table
                ->foreign('member_id')
                ->references('id')
                ->on('organization_members')
                ->onDelete('cascade');

            $table->unsignedBigInteger('experience_id');
            $table
                ->foreign('experience_id')
                ->references('id')
                ->on('experiences')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('custodians');
    }
};

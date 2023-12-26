<?php

use App\Enums\GenderEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('experience_gender_groups', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', GenderEnum::values());
            $table->integer('percentage');
            $table->integer('discount_in_cents')->default(0);

            // Relations
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
        Schema::dropIfExists('experience_gender_groups');
    }
};

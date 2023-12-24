<?php

use App\Enums\ExperienceStatusEnum;
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table
                ->enum('status', ExperienceStatusEnum::values())
                ->default(ExperienceStatusEnum::DRAFT->value);
            $table->text('description')->default('');
            $table->date('date');
            $table->time('time', 0);
            $table->integer('price_in_cents');
            $table->integer('participants_limit');
            $table->integer('age_range_start')->default(18);
            $table->integer('age_range_end')->default(110);

            // References
            $table->unsignedBigInteger('organization_id');
            $table
                ->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->onDelete('cascade');

            $table->unsignedBigInteger('location_id');
            $table
                ->foreign('location_id')
                ->references('id')
                ->on('locations');

            $table->unsignedBigInteger('trail_id')->nullable();
            $table
                ->foreign('trail_id')
                ->references('id')
                ->on('locations')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};

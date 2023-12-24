<?php

namespace Database\Factories;

use App\Enums\ExperienceStatusEnum;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Models>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $organization = Organization::factory()->create();

        return [
            'organization_id' => $organization->id,
            'title' => fake()->title(),
            'status' => ExperienceStatusEnum::ACTIVE->value,
            'description' => fake()->text(),
            'date' => '2024-10-10',
            'time' => '9:30',
            'location_id' => $organization->location->id,
            'price_in_cents' => 20_00,
            'participants_limit' => 20,
            'age_range_start' => 35,
            'age_range_end' => 45,
        ];
    }
}

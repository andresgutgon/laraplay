<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory {
    public function definition(): array {
        $location = Location::factory()->create();

        return [
            'name' => fake()->name,
            'location_id' => $location->id,
        ];
    }
}

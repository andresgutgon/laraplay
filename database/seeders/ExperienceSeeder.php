<?php

namespace Database\Seeders;

use App\Enums\ExperienceStatusEnum;
use App\Models\Country;
use App\Models\Experiences\DatingExperience;
use App\Models\Location;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $organization = Organization::where('slug', 'paco-s-organization')->first();
            $spain = Country::where('code', 'ES')->first();
            $location = Location::create([
                'road' => 'Plaça Catalunya',
                'house_number' => '1',
                'city' => 'Barcelona',
                'country_id' => $spain->id]
            );
            $experience = DatingExperience::create([
                'organization_id' => $organization->id,
                'title' => 'Caminata por el Parque Natural del Montseny',
                'status' => ExperienceStatusEnum::ACTIVE->value,
                'description' => 'Bonito paseo por el Montseny',
                'date' => '2024-10-10',
                'time' => '9:30',
                'location_id' => $location->id,
                'price_in_cents' => 20_00,
                'participants_limit' => 20,
                'age_range_start' => 35,
                'age_range_end' => 45,
            ]);
        });
    }
}

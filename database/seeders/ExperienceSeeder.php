<?php

namespace Database\Seeders;

use App\Enums\ExperienceStatusEnum;
use App\Models\Country;
use App\Models\Custodian;
use App\Models\Experiences\DatingExperience;
use App\Models\Location;
use App\Models\Organization;
use App\Models\OrganizationMember;
use App\Models\Participant;
use App\Models\Trail;
use App\Models\User;
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
            $trail = Trail::where('slug', 'ruta-colserolla-en-bicicleta')->first();
            $experience = DatingExperience::create([
                'organization_id' => $organization->id,
                'trail_id' => $trail->id,
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

            // Custodian
            $maria = OrganizationMember::whereHas('user', function ($query) {
                $query->where('email', 'maria@merlo.io');
            })->first();
            Custodian::create(['member_id' => $maria->id, 'experience_id' => $experience->id]);

            // Participants
            $elena = User::where('email', 'elchez@gmail.com')->first();
            $hector = User::where('email', 'hector@hotmail.com')->first();
            Participant::create(['user_id' => $elena->id, 'experience_id' => $experience->id]);
            Participant::create(['user_id' => $hector->id, 'experience_id' => $experience->id]);
        });
    }
}

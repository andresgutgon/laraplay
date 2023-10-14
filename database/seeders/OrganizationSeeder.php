<?php

namespace Database\Seeders;

use App\Enums\OrganizationRoleEnum;
use App\Models\Country;
use App\Models\Location;
use App\Models\Organization;
use App\Models\OrganizationMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $spain = Country::where('code', 'ES')->first();
            $location = Location::create(['city' => 'Barcelona', 'country_id' => $spain->id]);
            $organization = Organization::create([
                'name' => "Paco's Organization",
                'location_id' => $location->id,
            ]);

            $paco = User::where('email', 'paco@merlo.io')->first();
            $maria = User::where('email', 'maria@merlo.io')->first();
            OrganizationMember::create([
                'user_id' => $paco->id,
                'organization_id' => $organization->id,
                'role' => OrganizationRoleEnum::OWNER->value,
            ]);
            OrganizationMember::create([
                'user_id' => $maria->id,
                'organization_id' => $organization->id,
                'role' => OrganizationRoleEnum::ADMIN->value,
            ]);
        });
    }
}

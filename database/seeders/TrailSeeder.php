<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Trail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrailSeeder extends Seeder
{
    public function run(): void
    {
        //
        DB::transaction(function () {
            $organization = Organization::where('slug', 'paco-s-organization')->first();
            Trail::create([
                'title' => 'Ruta colserolla en bicicleta',
                'description' => 'Nice markdown description here',
                'organization_id' => $organization->id,
            ]);
        });
    }
}

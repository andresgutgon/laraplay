<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            User::create([
                'email' => 'paco@merlo.io',
                'name' => 'Paco',
                'gender' => GenderEnum::MALE->value,
                'last_name' => 'Merlo',
                'password' => 'papapa44',
            ]);
            User::create([
                'email' => 'maria@merlo.io',
                'name' => 'Maria',
                'last_name' => 'Green',
                'gender' => GenderEnum::FEMALE->value,
                'password' => 'papapa44',
            ]);
        });
    }
}

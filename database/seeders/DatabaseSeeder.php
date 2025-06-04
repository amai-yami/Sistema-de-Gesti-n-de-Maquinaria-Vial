<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

// 👇 Agrega estas líneas según los seeders que tengas
use Database\Seeders\ProvinceTableSeeder;
use Database\Seeders\WorkTableSeeder;
use Database\Seeders\MachineTypeTableSeeder;
use Database\Seeders\MachineTableSeeder;
use Database\Seeders\MachineWorkTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        $this->call([
            ProvinceTableSeeder::class,
            WorkTableSeeder::class,
            MachineTypeTableSeeder::class,
            MachineTableSeeder::class,
            MachineWorkTableSeeder::class,
        ]);
    }
}

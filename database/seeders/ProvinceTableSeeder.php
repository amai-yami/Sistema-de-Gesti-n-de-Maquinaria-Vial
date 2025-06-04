<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceTableSeeder extends Seeder
{
    public function run(): void
    {
        Province::create(['name' => 'san juan']);  
        Province::create(['name' => 'formosa']);
        Province::create(['name' => 'chaco']);
        Province::create(['name' => 'corrientes']);
        Province::create(['name' => 'misiones']);
        Province::create(['name' => 'entre rios']);
        Province::create(['name' => 'santa fe']);
        Province::create(['name' => 'tucuman']);
        Province::create(['name' => 'santiago del estero']);
        Province::create(['name' => 'catamarca']);
        Province::create(['name' => 'la rioja']);
        Province::create(['name' => 'san luis']);
        Province::create(['name' => 'mendoza']);
        Province::create(['name' => 'neuquen']);
        Province::create(['name' => 'tierra del fuego']);
        Province::create(['name' => 'chubut']);
        Province::create(['name' => 'santa cruz']);
        Province::create(['name' => 'buenos aires']);
    }
}

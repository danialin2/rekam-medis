<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::create([
            'name' => 'Islam'
        ]);
        Religion::create([
            'name' => 'Kristen'
        ]);
        Religion::create([
            'name' => 'Katolik'
        ]);
        Religion::create([
            'name' => 'Hindu'
        ]);
        Religion::create([
            'name' => 'Buddha'
        ]);
        Religion::create([
            'name' => 'Khonghucu'
        ]);
    }
}

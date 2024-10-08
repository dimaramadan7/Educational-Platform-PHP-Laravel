<?php

namespace Database\Seeders;
use App\Models\Trainer;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainer::create([
            'name' => 'Dema Ramdan',
            'spec' => 'Full Stack Web Developer',
            'img' => '1.png',
        ]);

        Trainer::create([
            'name' => 'Razan Al',
            'spec' => 'dentistry',
            'img' => '2.png',
        ]);

        Trainer::create([
            'name' => 'Fatima Al',
            'spec' => 'Laboratory analysis',
            'img' => '3.png',
        ]);

        Trainer::create([
            'name' => 'Jana Al',
            'spec' => 'teacher',
            'img' => '4.png',
        ]);

        Trainer::create([
            'name' => 'hanin',
            'spec' => 'pharmacy',
            'img' => '5.png',
        ]);
    }
}

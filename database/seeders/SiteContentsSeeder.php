<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContent;

class SiteContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContent::create([
            'name' => 'banner',
            'content' => json_encode([
                'title' => 'EVERY STUDENT YEARNS TO LEARN',
                'subtitle' => 'Making Your Childs World Better',
                'desc' => 'We strive to enhance your knowledge and skills, empowering you to create a better future.
                Our platform provides a diverse range of courses and resources to enrich your learning journey.
               Join us and embark on a transformative educational adventure.',
            ]),
        ]);

        SiteContent::create([
            'name' => 'courses',
            'content' => json_encode([
                'title' => 'our courses',
                'subtitle' => 'different categories',
            ]),
        ]);
    }
}

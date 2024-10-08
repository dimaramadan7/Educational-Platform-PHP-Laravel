<?php

namespace Database\Seeders;
use App\Models\Course;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=3 ; $i++) { 
            for ($j=1; $j <= 6; $j++) { 
                Course::create([
                    'cat_id' => $i,
                    'trainer_id' => rand(1, 5),
                    'name' => "course num $j cat num $i",
                    'small_desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum",
                    'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                    'price' => rand(1000, 5000),
                    'img' => "$i$j.png"
                ]);
            }
        }
    }
}

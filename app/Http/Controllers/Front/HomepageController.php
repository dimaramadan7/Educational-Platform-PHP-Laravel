<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\Test;
use App\Models\Cat;
use App\Models\SiteContent;

class HomepageController extends Controller
{
    public function index()
        {
            $data['banner'] = SiteContent::select('content')->where('name', 'banner')->first();
            $data['courses_content'] = SiteContent::select('content')->where('name', 'courses')->first();
            
            $data['courses'] = Course::select('id', 'name', 'small_desc', 'cat_id', 'trainer_id', 'img', 'price')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

            // counter
            $data['courses_count'] = Course::count();
            $data['trainers_count'] = Trainer::count();
            $data['students_count'] = Student::count();

            // test
            $data['test'] = Test::select('name', 'spec' , 'desc', 'img')
            ->get();

        return view('Front.index')->with($data);
    }
}

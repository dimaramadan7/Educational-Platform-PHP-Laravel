<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\course_student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManagerStatic as Image;
// use mysqli;

class StudentController extends Controller
{
    public function index(){
        $data['students'] = Student::select('id','name','email','spec')->orderBy('id', 'DESC')->get();
        return view('Admin.students.index')->with($data);
    }
    public function create(){
        return view('Admin.students.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|max:50|unique:students',
            'spec' => 'nullable|string|max:50',
        ]);
        Student::create($data);

        return redirect(route('Admin.students.index'));
    }
    public function edit($id){
        $data['student'] = Student::findOrFail($id);
        return view('Admin.Students.edit')->with($data);
    }
    public function update(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|max:50',
            // 'email' => 'required|email|max:50|unique:students',
            'spec' => 'nullable|string|max:50',
        ]);
        Student::findOrFail($request->id)->update($data);
        return redirect(route('Admin.students.index'));
    }
    

    public function delete($id){
        DB::transaction(function () use ($id) {
            DB::table('course_student')->where('student_id', $id)->delete();
            DB::table('students')->where('id', $id)->delete();
        });

        return back();    
    }

    public function showCourses($id){
        $data['courses'] = Student::findOrFail($id)->courses;
        $data['student_id'] = $id;

        return view('Admin.students.showCourses')->with($data);
    }

    public function approveCourse($id, $c_id){
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'approve'
        ]);

        return back();
    }

    public function rejectCourse($id, $c_id){
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'reject'
        ]);

        return back();
    }

    public function addCourse($id){
        $data['student_id'] = $id;

        $data['courses'] = Course::select('id', 'name')->get();

        return view('Admin.students.addCourse')->with($data);
    }

    public function storeCourse($id, Request $request){
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);
    
        DB::table('course_student')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id'],
        ]);
    
        return redirect(route('Admin.students.showCourses', $id));
    }
}
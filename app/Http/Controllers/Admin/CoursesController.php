<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Cat;
use App\Models\Trainer;
use Image;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function index(){
        $data['courses'] = Course::select('id', 'name', 'price', 'img')
        ->orderBy('id', 'DESC')->get();

        return view('Admin.courses.index')->with($data);
    }

    public function create(){
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        return view('Admin.courses.create')->with($data);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $new_name = $data['img']->hashName();
        // Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/course/' . $new_name));

        $data['img'] = $new_name;

        Course::create($data);

        return redirect(route('Admin.courses.index'));
    }
    
    public function edit($id){
        
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();

        $data['course'] = Course::findOrFail($id);
        return view('Admin.courses.edit')->with($data);
    }

    public function update(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $old_name = Course::findOrFail($request->id)->img;

        if($request->hasFile('img')){
            Storage::disk('uploads')->delete('course/' . $old_name);

            $new_name = $data['img']->hashName();
            // Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/course/' . $new_name));
    
            $data['img'] = $new_name;
        }
        else{
            $data['img'] = $old_name;
        }

        Course::findOrFail($request->id)->update($data);

        return back();
    }

    public function delete($id){
        $old_name = Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('trainer/' . $old_name);

        Course::findOrFail($id)->delete();
        return back();
    }

}

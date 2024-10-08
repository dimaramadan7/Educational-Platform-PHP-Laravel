<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\MessageController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Front')->group(function(){
    Route::get('/', [HomepageController::class, 'index'])->name('Front.Homepage');

    Route::get('/cat/{id}', [CourseController::class, 'cat'])->name('Front.cat');
    Route::get('/course/cat/{id}/course/{c_id}', [CourseController::class, 'show'])->name('Front.show');

    Route::get('/contact', [ContactController::class, 'index'])->name('Front.content');


    Route::post('/message/newsletter', [MessageController::class, 'newsletter'])->name('Front.message.newsletter');
    Route::post('/message/contact', [MessageController::class, 'contact'])->name('Front.message.contact');
    Route::post('/message/enroll', [MessageController::class, 'enroll'])->name('Front.message.enroll');

});

Route::namespace('Admin')->prefix('dashboard')->group(function(){

    Route::get('/login', [AuthController::class, 'login'])->name('Admin.login');
    Route::post('/dologin', [AuthController::class, 'dologin'])->name('Admin.dologin');

    Route::middleware('adminAuth:Admin')->group(function(){
            
        Route::get('/logout', [AuthController::class, 'logout'])->name('Admin.logout');
        Route::get('/', [HomeController::class, 'index'])->name('Admin.home');

        Route::get('/cats', [CatController::class, 'index'])->name('Admin.cats.index');
        Route::get('/cats/create', [CatController::class, 'create'])->name('Admin.cats.create');
        Route::post('/cats/store', [CatController::class, 'store'])->name('Admin.cats.store');
        Route::get('/cats/edit/{id}', [CatController::class, 'edit'])->name('Admin.cats.edit');
        Route::post('/cats/update', [CatController::class, 'update'])->name('Admin.cats.update');
        Route::get('/cats/delete/{id}', [CatController::class, 'delete'])->name('Admin.cats.delete');



        Route::get('/trainers', [TrainerController::class, 'index'])->name('Admin.trainers.index');
        Route::get('/trainers/create', [TrainerController::class, 'create'])->name('Admin.trainers.create');
        Route::post('/trainers/store', [TrainerController::class, 'store'])->name('Admin.trainers.store');
        Route::get('/trainers/edit/{id}', [TrainerController::class, 'edit'])->name('Admin.trainers.edit');
        Route::post('/trainers/update', [TrainerController::class, 'update'])->name('Admin.trainers.update');
        Route::get('/trainers/delete/{id}', [TrainerController::class, 'delete'])->name('Admin.trainers.delete');


        Route::get('/courses', [CoursesController::class, 'index'])->name('Admin.courses.index');
        Route::get('/courses/create', [CoursesController::class, 'create'])->name('Admin.courses.create');
        Route::post('/courses/store', [CoursesController::class, 'store'])->name('Admin.courses.store');
        Route::get('/courses/edit/{id}', [CoursesController::class, 'edit'])->name('Admin.courses.edit');
        Route::post('/courses/update', [CoursesController::class, 'update'])->name('Admin.courses.update');
        Route::get('/courses/delete/{id}', [CoursesController::class, 'delete'])->name('Admin.courses.delete');
    


        
        Route::get('/students',[StudentController::class, 'index'])->name('Admin.students.index');
        Route::get('/students/create',[StudentController::class, 'create'])->name('Admin.students.create');
        Route::post('/students/store', [StudentController::class,'store'])->name('Admin.students.store');
        Route::get('/students/edit/{id}', [StudentController::class,'edit'])->name('Admin.students.edit');
        Route::post('/students/update',[StudentController::class,'update'])->name('Admin.students.update');
        Route::get('/students/delete/{id}',[StudentController::class,'delete'])->name('Admin.students.delete');
        Route::get('/students/show-courses/{id}',[StudentController::class,'showCourses'])->name('Admin.students.showCourses');
        Route::get('/students/{id}/courses/{c_id}/approve',[StudentController::class,'approveCourse'])->name('Admin.students.approveCourse');
        Route::get('/students/{id}/courses/{c_id}/reject',[StudentController::class,'rejectCourse'])->name('Admin.students.rejectCourse');
        Route::get('/students/{id}/add-to-course',[StudentController::class,'addCourse'])->name('Admin.students.addCourse');
        Route::post('/students/{id}/add-to-course',[StudentController::class,'storeCourse'])->name('Admin.students.storeCourse');
        
    });

});
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashStudentController;
use App\Http\Controllers\DashTeacherController;
use App\Http\Controllers\Admin\SectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {



    // admin only
    Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
        Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

        // categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
        Route::get('categories_upload_course/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'uploadCourse'])->name('categories.upload_course');

        // questions
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::delete('questions_mass_destroy', [\App\Http\Controllers\Admin\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');

        // options
        Route::resource('options', \App\Http\Controllers\Admin\OptionController::class);
        Route::delete('options_mass_destroy', [\App\Http\Controllers\Admin\OptionController::class, 'massDestroy'])->name('options.mass_destroy');

        // results
        Route::resource('results', \App\Http\Controllers\Admin\ResultController::class);
        Route::delete('results_mass_destroy', [\App\Http\Controllers\Admin\ResultController::class, 'massDestroy'])->name('results.mass_destroy');

        Route::resource('departments', DepartmentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('students', StudentController::class);
        Route::resource('sections', SectionController::class);
    });


    // // Student
    Route::middleware(['auth', 'isStudent'])->group(function () {
        Route::resource('dashstudents', DashStudentController::class);
        // Route::resource('tests', TestController::class);

        // tests
        Route::get('test', [\App\Http\Controllers\TestController::class, 'index'])->name('students.test');
        Route::get('test/{id}', [\App\Http\Controllers\TestController::class, 'test'])->name('students.show');
        Route::post('test', [TestController::class, 'store'])->name('student.test.store');
        Route::get('results/{result_id}', [\App\Http\Controllers\ResultController::class, 'show'])->name('student.test.result');
        // Route::get('results/{result_id}', [\App\Http\Controllers\ResultController::class, 'show'])->name('student.result.show');

        // Lesson
        Route::resource('student_lessons', \App\Http\Controllers\StudentLesson::class);
    });

    // });
    //Teacher
    Route::group(['middleware' => 'isTeacher', 'prefix' => 'teacher', 'as' => 'teacher.'],  function () {
        Route::resource('dashteachers', DashTeacherController::class);

        // categories
        Route::resource('teacher_categories', \App\Http\Controllers\Teacher\TeacherCategory::class);

        // questions
        Route::resource('teacher_questions', \App\Http\Controllers\Teacher\TeacherQuestion::class);

        // options
        Route::resource('teacher_options', \App\Http\Controllers\Teacher\TeacherOption::class);

        // results
        Route::resource('teacher_results', \App\Http\Controllers\Teacher\TeacherResult::class);

        // Lesson
        Route::resource('teacher_lessons', \App\Http\Controllers\Teacher\TeacherLesson::class);
    });
});

Auth::routes();



// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::resource('dashboards', DashboardController::class);

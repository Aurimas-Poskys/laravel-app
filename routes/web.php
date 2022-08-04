<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\EnsureProjectIsCreated;

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
    return view('homepage');
})->name('homepage');

Route::post('/', [ProjectsController::class, 'store'])->name('project_store');


// If there is no project, always redirect to homepage
Route::middleware([EnsureProjectIsCreated::class])->group(function () {

    Route::get('/project', [ProjectsController::class, 'index'])->name('project_view');
    Route::delete('/project/{project}', [ProjectsController::class, 'destroy'])->name('project_destroy');


    Route::resource('students', StudentsController::class)->except([ 'index', 'show' ])
    ->names([
        'create' => 'students_create',
        'store' => 'students_store',
        'destroy' => 'students_destroy',
    ]);


    Route::post('/group/{group}', [GroupsController::class, 'store'])->name('student_to_group');
});



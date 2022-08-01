<?php

use App\Models\Group;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\StudentsController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


Route::get('/project', [ProjectsController::class, 'index'])->name('project');
// Route::get('/project', function(){

//     $projects = Project::find(1);
    
//     // $groups = Group::find(1);
//     // dd($groups);
    

//     dd($projects->studentGroups);
// })->name('project');

Route::post('/project', [ProjectsController::class, 'store']);

Route::get('/project/create', [ProjectsController::class, 'create']);

Route::get('/project/{project}/edit', [ProjectsController::class, 'edit']);

Route::put('/project/{project}', [ProjectsController::class, 'update']);

Route::delete('/project/{project}', [ProjectsController::class, 'destroy'])->name('project_destroy');


Route::get('/', function () {
    return view('homepage');
})->name('welcome');


// Route::post('/rent/{car}/reservation2', 'ReservationController@store')->name('reservation_store');

Route::post('/', [ProjectsController::class, 'store'])->name('project_store');


Route::get('/students', [StudentsController::class, 'index'])->name('students_view');

Route::get('/student/create', [StudentsController::class, 'create'])->name('students_create');
Route::post('/student/create', [StudentsController::class, 'store'])->name('students_store');

Route::delete('/student/{student}', [StudentsController::class, 'destroy'])->name('students_destroy');

Route::post('/students/{group}', [StudentsController::class, 'store']);


Route::get('/group/{group}', [GroupsController::class, 'show']);

Route::post('/group/{group}', [GroupsController::class, 'store'])->name('student_to_group');

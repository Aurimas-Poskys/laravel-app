<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use App\Rules\MultipleWords;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function create()
    {
        $project = Project::get()->last();

        return (isset($project)) ? view('students.create') : redirect()->route('welcome');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'full_name' => ['required', 'unique:students', 'min:6', 'max:30', new MultipleWords()],
        ]);

        Student::create([
            'full_name' => request('full_name'),
        ]);
        
        return redirect()->route('project_view');
    }


    public function destroy(Student $student)
    {

        try {
            $student->delete();
        } catch (\Exception $e) {
            dd($e);
        };

        return redirect()->route('project_view');
    }
}

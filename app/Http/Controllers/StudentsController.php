<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function index() 
    {

        $students = Student::all();

        return view('students.index', [ 'students' => $students ]);

    }


    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'full_name' => ['required', 'unique:students', 'min:6', 'max:30'],
        ]);


        Student::create([
            'full_name' => request('full_name'),
        ]);

        return redirect()->route('project');
    }


    public function destroy(Student $student)
    {

        try {
            $student->delete();
        } catch (\Exception $e) {
            dd($e);
        };

        return redirect()->route('project');
    }
}

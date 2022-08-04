<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  
    public function store(Request $request)
    {
        $project = Project::get()->last();

        if(isset($project)) {

            $student = new Student;
            $student->full_name = $request->full_name;
            $student->save();

            return response()->json([ "message" => "student record created" ], 201);
        } else {

            return response()->json([ "message" => "There is no project created" ], 201);
        }
    }
}

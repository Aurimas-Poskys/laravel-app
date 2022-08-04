<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
  

    public function store()
    {

        $group = Group::find(request('group_id'));
        $student = Student::find(request('student_id'));

        // // Add Group ID to students table
        $group->students()->save($student);

        return response()->json(["status"=>"success", 'group_id'=>request('group_id'), 'student_id'=>request('student_id')], 200);
    }
}

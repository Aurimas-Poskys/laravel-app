<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    
    public function show(Group $group)
    {

        // $group = Group::find(request('group_id'));
        // $student = Group::find(request('student_id'));

        $student = Student::find(1);
        
        dd($student->myGroup);
    }

    public function store()
    {

        $group = Group::find(request('group_id'));
        $student = Student::find(request('student_id'));

        // // Add Group ID to students table
        $group->students()->save($student);

        // // Add Student ID to group table
        // $student->myGroup()->associate($group);

        return response()->json(["status"=>"success", 'group_id'=>request('group_id'), 'student_id'=>request('student_id')], 200);

    }
}

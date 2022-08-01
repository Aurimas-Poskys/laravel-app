<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    
    public function index() 
    {

        $project = Project::get()->last();
        
        $students = Student::all();

        // If project exists, display status page. Else redirect to homepage
        return (isset($project)) ? view('projects.index', ['project' => $project, 'students' => $students]) : redirect()->route('welcome');
    }

    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'groups' => 'required',
            'students' => 'required',
        ]);


        $project = Project::create([
            'title' => request('title'),
            'groups' => request('groups'),
            'students' => request('students'),
        ]);


        // When Project is created, create x Groups and attach to project

        for ($i = 1; $i <= $request->groups; $i++) {
           
            $project->studentGroups()->create([
                'project_id' => $project->id,
            ]);
        }


        return redirect()->route('project');
    }


    public function edit(Project $project) 
    {

        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project) 
    {
     
        request()->validate([
            'title' => 'required',
        ]);
        
        $project->update([
            'title' => request('title'),
        ]);

        return redirect('/project');
    }

    public function destroy(Project $project)
    {

        $project->delete();

        return redirect('/');
    }
}

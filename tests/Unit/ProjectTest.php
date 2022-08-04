<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Middleware\EnsureProjectIsCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_stores_new_project()
    {
        $response = $this->post('/', [
            'title' => 'Random title',
            'groups' => 2,
            'students' => 5,
        ]);

        $response->assertRedirect('/project');
    }


    public function test_initialized_groups_after_project_create()
    {
        $response = $this->post('/', [
            'title' => 'Summerfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $project = Project::where('title', 'Summerfest')->firstOrFail();

        $this->assertTrue($project->studentGroups()->exists());
    }


    public function test_cant_add_student_if_no_project_exists()
    {
        $response = $this->post('/students', [
            'full_name' => 'John Doe',
        ]);

        // If no project, redirect to home
        $response->assertRedirect('/');
    }


    public function test_add_student_if_project_exists()
    {
        $project = Project::create([
            'title' => 'Winterfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $response = $this->post('/students', [
            'full_name' => 'John Doe',
        ]);

        // If project exists, redirect to it
        $response->assertRedirect('/project');
    }


    public function test_student_has_unique_name()
    {
        $project = Project::create([
            'title' => 'Winterfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $student = Student::create([
            'full_name' => 'John Doe',
        ]);

        $response = $this->post('/students', [
            'full_name' => 'John Doe',
        ]);


        $response->assertSessionHasErrors([
            'full_name' => 'The full name has already been taken.'
        ]);
    }

    public function test_dispaly_students()
    {
        $project = Project::create([
            'title' => 'Winterfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $student = Student::create([
            'full_name' => 'John Doe',
        ]);

        $response = $this->get('/project');

        // Test if one student is being displayed
        $this->assertEquals(1, count($response['students']));
    }

    public function test_delete_student()
    {
        $project = Project::create([
            'title' => 'Winterfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $student = Student::create([
            'full_name' => 'John Doe',
        ]);

        if($student) {
            $student->delete();
        }

        $this->assertTrue(true);
    }

    public function test_assign_student_to_group()
    {
        $response = $this->post('/', [
            'title' => 'Summerfest',
            'groups' => 2,
            'students' => 5,
        ]);

        $project = Project::where('title', 'Summerfest')->firstOrFail();


        $student = Student::create([
            'full_name' => 'John Doe',
        ]);
        
        $group = Group::where('project_id', $project->id)->first();
        $group->students()->save($student);

        // Test if one student is assigned to group
        $this->assertEquals(1, count($group->students));
    }
}

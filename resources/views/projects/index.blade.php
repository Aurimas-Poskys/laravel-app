@extends('welcome')


@section('content')
    
<div class="container ">
    
    <div class="row mb-4">
      
        <div class="col-sm">
          

            <p>Project: <b>{{ $project->title }}</b></p>
            <p>Number of groups: <b>{{ $project->groups }}</b></p>
            <p>Students per group: <b>{{ $project->students }}</b></p>

        </div>
  </div>

    <div class="row mb-3">
      
        <div class="col-sm">

            <h4>Students</h4>

        
        
      
            <div class="row">


                <div class="col-md-6 col-sm-12 mt-2 mb-3">
                    <table class="table table-bordered text-center students-table">
                        <thead class="thead-light">
                          <tr class="table-active">
                            <th scope="col">Student</th>
                            <th scope="">Group</th>
                            <th scope="">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($students as $student)

                            <tr>
                                <td>{{ $student->full_name }}</td>

                                <?php 
                                    $gr_id = App\Models\Group::get()->first();
                                ?>
                                 
                                @if (isset($student->group_id))

                                    {{-- (Group ID) - (First Group ID record, in case ID starts not from 1) --}}
                                    <td>Group #{{ $student->group_id - $gr_id->id + 1 }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                <td>
                                    
                                    <form action="{{ route('students_destroy', $student) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>

                            @endforeach
                        
                        </tbody>
                      </table>
                      <a href="{{ route('students_create') }}" class="btn btn-secondary px-5">Add new student</a>
                </div>

               
        
            </div>

        </div>
     
    </div>

   
   
    @if($project)

        



        <h4>Groups</h4>

            <div class="row text-center">

                
                @foreach($project->studentGroups as $group)

                <div class="col-md-3 col-sm-6 mt-2">
                    <table class="table table-bordered groups-table">
                        <thead class="thead-light">
                          <tr class="table-active">
                            <th scope="col">Group #{{ $loop->index + 1 }}</th>
                          </tr>
                        </thead>
                        <tbody>

                            

                            @foreach($group->students as $student)

                            <tr>
                                <td>
                                    {{ $student->full_name }}
                                </td>
                            </tr>

                            @endforeach


                            @for ($j = count($group->students); $j < $project->students; $j++)

                            </tr>
                                <td>

                                    <select class="form-select" id="group_students" data-id="{{ $group->id }}" data-route="{{ route('student_to_group', $group) }}" name="group_students" aria-label="select">

                                        <option selected>Assign student</option>

                                        @foreach($students->whereNull('group_id') as $student)
                                            <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                        @endforeach

                                      </select>
                                 
                                </td>
                            </tr>

                            @endfor

                        
                           
                        </tbody>
                      </table>
                </div>

                @endforeach
               
        
            </div>
        




        {{-- @include('partials._hero') --}}
        {{-- <p><a href="/project/{{ $project->id }}/edit">{{ $project->title }}</a></p> --}}


        

    @else

        

  
    @endif



    </div>
     


@endsection

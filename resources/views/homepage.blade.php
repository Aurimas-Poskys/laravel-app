@extends('welcome')


@section('content')



<div class="container text-center">
   
    <div class="row">
      
      <div class="col-sm">


        @if($project = \App\Models\Project::query()->get()->last())

            <h2 class="mb-4">{{ $project->title }}</h2>

            <div class="mb-4"><a href="{{ route('project_view') }}">Go to project</a></div>

            <form action="{{ route('project_destroy', $project) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Delete project</button>
            </form>


        @else

            <h2 class="mb-4">Create new Project</h2>

            <form method="POST" action="{{ route('project_store') }}">

                @csrf

                <div class="form-row mb-4">
                    <div class="col-sm-5 mx-auto">
                        <label for="title">Project name</label>
                    </div>
                    <div class="col-sm-5 mx-auto">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-sm-5 mx-auto">
                        <label for="groups">Number of groups</label>
                    </div>
                    <div class="col-sm-5 mx-auto">
                        <input type="number" max="10" min="1" class="form-control @error('groups') is-invalid @enderror" name="groups" id="groups" value="{{old('groups')}}">

                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-sm-5 mx-auto">
                        <label for="students">Maximum number of students per group</label>
                    </div>
                    <div class="col-sm-5 mx-auto">
                        <input type="number" max="10" min="1" class="form-control @error('students') is-invalid @enderror" name="students" id="students"               value="{{old('students')}}">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-sm-10 mx-auto">
                        <a href=""> <button type="submit"
                            class="float-right btn btn-secondary">Submit</button></a>
                    </div>
                </div>
        
            </form>


        @endif

        
      </div>
     
    </div>

  </div>

@endsection

@extends('welcome')


@section('content')

{{-- <div class="d-flex justify-content-center align-items-center h-100 text-center">
    
    <form>
        <div class="form-group">
          <h3>Project name</h3>
          <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
        </div>
       
      </form>

</div> --}}

<div class="container text-center">
    <div class="row">
      
      <div class="col-sm">

        

        

        @if($project = \App\Models\Project::query()->get()->last())

        <h2 class="mb-4">{{ $project->title }}</h2>

        <div class="mb-4"><a href="{{ route('project') }}">Go to project</a></div>

          <form action="{{ route('project_destroy', $project) }}" method="POST">
                @csrf
                @method('delete')
                <button>Delete project</button>
            </form>

        @else

        <h2>Create a new Project</h2>

            <form method="POST" action="{{ route('project_store') }}">

                @csrf

                <div class="form-row mb-4">
                    <div class="col-sm-5">
                        <label for="title">Project name</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-5">
                        <label for="groups">Number of groups</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="number" max="10" min="1" class="form-control @error('groups') is-invalid @enderror" name="groups" id="groups" value="{{old('groups')}}">

                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-5">
                        <label for="students">Maximum number of students per group</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="number" max="10" min="1" class="form-control @error('students') is-invalid @enderror" name="students" id="students"               value="{{old('students')}}">

                    </div>

                </div>

                <div class="form-row mb-4">
                    
                    <div class="col-sm-10">
                        <a href=""> <button type="submit"
                            class="float-right btn btn-primary">Submit</button></a>

                    </div>

                </div>
            
                
        
            </form>


        @endif

        
      </div>
     
    </div>
  </div>

@endsection

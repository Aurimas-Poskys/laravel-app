@extends('welcome')


@section('content')
    
    <div class="container">
    
        <a href="{{ route('project_view') }}">Go back</a>

        <h4 class="my-4">Create new student</h4>

        <form method="POST" action="{{ route('students_store') }}">

            @csrf

            <div class="form-row mb-4">
                <div class="col-md-2">
                    <label for="full_name">Full name</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{old('full_name')}}">
                </div>
            </div>
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-row mb-4">
                <div class="col-md-6">
                    <button type="submit" class="float-right btn btn-secondary">Submit</button>
                </div>
            </div>
    
        </form>

    </div>

@endsection

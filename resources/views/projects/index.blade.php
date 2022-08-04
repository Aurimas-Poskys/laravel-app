@extends('welcome')


@push('meta')
    <meta http-equiv="refresh" content="10">
@endpush


@section('content')
    
<div class="container">
    
    <div class="row mb-4">
    
        <div class="col-sm">
        
            <p>Project: <b>{{ $project->title }}</b></p>
            <p>Number of groups: <b>{{ $project->groups }}</b></p>
            <p>Students per group: <b>{{ $project->students }}</b></p>

        </div>

    </div>

    
    {{-- Students section --}}
    @include('partials._students')


    {{-- Groups section --}}
    @include('partials._groups')


</div>
     
@endsection

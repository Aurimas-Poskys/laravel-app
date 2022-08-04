<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('meta')
    
</head>
<body>


    <div class="modal-header">
       
        <div class="title-left">
    
    
        </div>

        <div class="title-right">
    
            <a href="{{ route('homepage') }}" class="link-success me-3">Home</a>

            @if($project = \App\Models\Project::query()->get()->last())

            <a href="{{ route('project_view') }}" class="link-success">Project</a>

            @endif

        </div>

    </div>


    <main class="">
        @yield('content')
    </main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('js/index.js')}}" type="text/javascript"></script>

</body>
</html>
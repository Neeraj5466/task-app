@extends('layouts.main')

@section('content')
    
    <div class="container">
        <h1>{{$task->task}}</h1>

        <p>{{$task->description}}</p>

        <p>{{$task->priority}}</p>

        <p>{{$task->status}}</p>
        
    </div>


@endsection
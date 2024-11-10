@extends('layouts.main')

@section('content')
    
    <div class="container">
        <h1 class="my-2 fw-bold">All Tasks  </h1>
        <a href="{{route('tasks.create')}}" class="btn btn-primary btn-sm float-end my-4">Add Task</a>
        <a href="{{route('livewiretask')}}" class="btn btn-warning">With Livewire</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $task)

                <tr>
                    <th>{{$task->id}}</th>
                    <td><a href="{{route('tasks.show',['task'=>$task->id])}}">{{$task->task}}</a> <sup class="text-danger">{{$task->priority}}</sup></td>
                    <td>{{$task->status}}</td>
                    <td class="d-flex">
                        <a href="{{route('tasks.edit',['task'=>$task->id])}}" class="btn btn-warning "><i class="bi bi-pencil-square"></i></a>
                     
                        <form action="{{route('tasks.destroy',['task'=>$task->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-4"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                   
                  </tr>

                @endforeach        
               
             
            </tbody>
          </table>
    
    </div>


@endsection
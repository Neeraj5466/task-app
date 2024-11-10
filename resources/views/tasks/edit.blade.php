@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center my-2">Update Task</h1>
        <form method="POST" action="{{route('tasks.update',['task'=>$task->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="task" class="form-label">Task</label>
              <input type="text" class="form-control" id="task" name="task" value="{{$task->task}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$task->description}}</textarea>
              </div>
            
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="priority">
                    <option selected>Select Priority</option>
                    <option value="High" @if ($task->priority=="High") selected @endif>High</option>
                    <option value="Medium" @if ($task->priority=="Medium") selected @endif>Medium</option>
                    <option value="Low" @if ($task->priority=="Low") selected @endif>Low</option>
                  </select>
              
            </div>

           

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Pending" @if ($task->status=="Pending") checked @endif>
                <label class="form-check-label" for="status1">
                  Pending
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="On Progress" @if ($task->status=="On Progress") checked @endif >
                <label class="form-check-label" for="statust2">
                  On Progress
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status3" value="Completed" @if ($task->status=="Completed") checked @endif>
                <label class="form-check-label" for="status3">
                  Completed
                </label>
              </div>

            <button type="submit" class="btn btn-primary my-4">Update Task</button>
          </form>
    </div>
    
@endsection
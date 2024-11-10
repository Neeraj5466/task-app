@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center my-2">Add Task</h1>
        <form method="POST" action="{{route('tasks.store')}}">
            @csrf
            <div class="mb-3">
              <label for="task" class="form-label">Task</label>
              <input type="text" class="form-control" id="task" name="task" >
              @error('task')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>
            
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="priority">
                    <option selected>Select Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                  </select>
                  @error('priority')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Pending">
                <label class="form-check-label" for="status1">
                  Pending
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2"  value="On Progress">
                <label class="form-check-label" for="statust2">
                  On Progress
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status3" value="Completed">
                <label class="form-check-label" for="status3">
                  Completed
                </label>
            </div>
            @error('status')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

            <button type="submit" class="btn btn-primary my-4">Add Task</button>
          </form>
    </div>
@endsection
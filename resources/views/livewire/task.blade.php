<div>

    @if ($show=='AllTask')

    <div class="container">
        <h1 class="my-2 fw-bold">All Tasks  </h1>
        <button wire:click="addtask" class="btn btn-primary btn-sm float-end my-4">Add Task</button>

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
             
                        <button wire:click="editTask({{$task->id}})" class="btn btn-warning mx-4"><i class="bi bi-pencil-square"></i></button>
                        <button wire:click="deleteTask({{$task->id}})" class="btn btn-danger mx-4"><i class="bi bi-trash"></i></button>
                        
                    </td>
                   
                  </tr>

                @endforeach        
               
             
            </tbody>
          </table>
    
    </div>

    @elseif($show=='AddTask')

    <div class="container">
        <h1 class="text-center my-2">Add Task</h1>
        <form wire:submit.prevent="submit">
            <div class="mb-3">
              <label for="task" class="form-label">Task</label>
              <input type="text" class="form-control" id="task" wire:model="task" >
              @error('task')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>
            
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" wire:model="priority">
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
                <input class="form-check-input" type="radio" wire:model="status" id="status1" value="Pending">
                <label class="form-check-label" for="status1">
                  Pending
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" id="status2"  value="On Progress">
                <label class="form-check-label" for="statust2">
                  On Progress
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" id="status3" value="Completed">
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
    @elseif($show=='EditTask')

    <div class="container">
        <h1 class="text-center my-2">Update Task</h1>
        <form wire:submit.prevent="updateTask({{$id}})">
           
           
            <div class="mb-3">
              <label for="task" class="form-label">Task</label>
              <input type="text" class="form-control" id="task" wire:model="task" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
              </div>
            
            <div class="mb-3">
              
                <select class="form-select" aria-label="Default select example" wire:model="priority">
                    <option selected>Select Priority</option>
                    <option value="High" >High</option>
                    <option value="Medium" >Medium</option>
                    <option value="Low" >Low</option>
                  </select>
              
            </div>

           

            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" id="status1" value="Pending" >
                <label class="form-check-label" for="status1">
                  Pending
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" id="status2" value="On Progress"  >
                <label class="form-check-label" for="statust2">
                  On Progress
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" id="status3" value="Completed" >
                <label class="form-check-label" for="status3">
                  Completed
                </label>
              </div>

            <button type="submit" class="btn btn-primary my-4">Update Task</button>
          </form>
    </div>

    @endif




</div>

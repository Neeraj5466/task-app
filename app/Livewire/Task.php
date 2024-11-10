<?php

namespace App\Livewire;

use App\Models\Task as ModelTask;
use Livewire\Component;

class Task extends Component
{
    public $id;
    public $tasks;
    public $task;
    public $description;
    public $priority;
    public $status;


    public $show="AllTask";

    public function mount(){
        $this->tasks=ModelTask::all();
    }

    
    public function render()
    {
        return view('livewire.task');
    }

    public function addtask(){
        $this->show="AddTask";
    }

    public function editTask($id){
        $this->id=$id;
       $task= ModelTask::find($id);
        $this->task=$task->task;
        $this->description=$task->description;
        $this->priority=$task->priority;
        $this->status=$task->status;
        $this->show="EditTask";

    }

    public function submit(){
         $this->validate([
            'task'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'status'=>'required',
        ]);

        $taskData=new ModelTask;

        $taskData->task=$this->task;
        $taskData->description=$this->description;
        $taskData->priority=$this->priority;
        $taskData->status=$this->status;
        $taskData->save();
        $this->mount();
        $this->show="AllTask";

    }

    
    public function updateTask($id){

       $this->id=$id;

        $this->validate([
           'task'=>'required',
           'description'=>'required',
           'priority'=>'required',
           'status'=>'required',
       ]);

       $taskData=ModelTask::find($id);

       $taskData->task=$this->task;
       $taskData->description=$this->description;
       $taskData->priority=$this->priority;
       $taskData->status=$this->status;
       $taskData->save();
       $this->mount();
       $this->show="AllTask";

   }

    public function deleteTask($id){
        ModelTask::find($id)->delete();
        $this->mount();
    }
}

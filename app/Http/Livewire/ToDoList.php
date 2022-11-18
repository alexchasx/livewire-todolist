<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\TaskList;
use Livewire\Component;

class ToDoList extends Component
{
    public function addTaskList()
    {
        TaskList::create([
            'title' => uniqid(),
        ]);
    }

    public function addTask(int $id)
    {
        Task::create([
            'task_list_id' => $id,
            'title' => uniqid(),
        ]);
    }
    
    public function deleteTaskList(int $id)
    {
        TaskList::destroy($id);
    }

    public function deleteTask(int $id)
    {
        Task::destroy($id);
    }

    public function render()
    {
        $taskLists = TaskList::orderBy('sort')->get();
        
        return view('livewire.to-do-list', compact('taskLists'));
    }
}

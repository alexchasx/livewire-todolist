<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\View\View;
use Livewire\Component;

class ToDoList extends Component
{
    public $title;
    public $addTaskListState = false;
    public $addTaskState = '';
    protected $rules = [
        'title' => 'required',
    ];

    public function addTaskList(): void
    {
        $this->addTaskListState = true;
    }

    public function addTask(int $taskListId): void
    {
        $this->addTaskState = $taskListId;
    }
    
    public function deleteTaskList(int $id): void
    {
        TaskList::destroy($id);
    }

    public function deleteTask(int $id): void
    {
        Task::destroy($id);
    }

    public function sorting($order): void
    {
        foreach ($order as $taskList) {
            TaskList::query()->where([
                'id' => $taskList['value']
            ])->update([
                'sort' => $taskList['order']
            ]);

            if (isset($taskList['items'])) {
                foreach ($taskList['items'] as $task) {
                    Task::query()->where([
                        'id' => $task['value']
                    ])->update([
                        'sort' => $task['order']
                    ]);
                }
            }
        }
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->addTaskListState) {
            TaskList::create($data);
        } else {
            $data['task_list_id'] = $this->addTaskState;
            Task::create($data);
        }

        $this->reset();
    }

    public function render(): View
    {
        $taskLists = TaskList::orderBy('sort')->get();

        return view('livewire.to-do-list', compact('taskLists'));
    }
}

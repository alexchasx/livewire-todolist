<div class="bg-blue w-full h-screen font-sans">
    <a wire:click="addTaskList" class="m-5 cursor-pointer">
        {{ __('Add task list') }}
    </a>
    
    <div wire:sortable="updateTaskList" wire:sortable-group="updateTask" class="flex px-4 pb-8 items-start overflow-x-scroll">
        
    @foreach($taskLists as $taskList)
        <div wire:key="group-{{ $taskList->id }}" wire:sortable.item="{{ $taskList->id }} class="rounded bg-grey-light flex-no-shrink w-64 p-2 mr-3">
            <div class="bg-grey-lighter flex justify-between py-1">
                <h3 wire:sortable.handle class="text-sm">{{ $taskList->title }}</h3>
                <a wire:click="deleteTaskList({{ $taskList->id }})" class="inline-flex text-red cursor-pointer">X</a>
            </div>
            
            <div class="text-sm mt-2">
                <div wire:sortable-group.item-group="{{ $taskList->id }}">    

                @foreach($taskList->tasks as $task)
                    <div class="bg-white p-2 flex justify-between rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
                        {{ $task->title }}
                        <svg wire:click="deleteTask({{ $task->id }})" class="h-6 w-6 text-red"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                    </div>
                @endforeach

                </div>
                
                <p wire:click="addTask({{ $taskList->id }})" class="mt-3 text-grey-dark cursor-pointer">{{ __('Add a task')}}</p>
            </div>
        </div>
    @endforeach

    </div>
</div>
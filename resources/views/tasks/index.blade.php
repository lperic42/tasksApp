@extends('layouts.app')

@section('content')

    <div class="tasksWrap">
        <div class="tasks">
            <a href="/dashboard" class="profile">{{ $admin->name }}</a>
            <a href="/tasks/create" class="Btn">Create a new task</a>
            <a href="{{ route('logOut') }}" class="logoutBtn">Log out</a>

        </div>
        <div class="tasksList">
            <div class="singleTask">
                @forelse ($tasks as $task)
                    <div class="singleTaskInner">
                    <p class="taskName">{{ $task->name }}</p>
                    <form method="post" action="{{route('finish',$task->id)}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="taskID" value="$task->id"/>
                        <button type="submit" class="finishedBtn">
                            Finished
                        </button>
                    </form>   
                    <form method="post" action="{{route('finish',$task->id)}}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="taskID" value="$task->id" />
                        <button type="submit" class="deleteBtn">
                            delete
                        </button>
                    </form>   
                    </div> 
                @empty
                <p class="empty">No tasks to show</p>          
                @endforelse
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="dashboardWrap">
        <div class="dashboard">
            <div class="dashboardHeader">
                <span class="username">
                    {{ $loggedUserInfo['name'] }}
                </span>
                <a href="{{ route('tasks') }}" class="Btn">My tasks</a>
                <a href="{{ route('logOut') }}" class="logoutBtn">Log out</a>
            </div>
            <div class="dashboardBody">
                <div class="profileInfo">
                    <div class="totalTasks">
                        <span class="header">Total tasks</span>
                        <span class="total">{{ count($totalTasks) }}</span>
                    </div>
                    <div class="finishedTasks">
                        <span class="header">Finished tasks</span>
                        <span class="total">{{ count($finishedTasks) }}</span>
                    </div>
                </div>
            </div>
                <div class="latestTasksWrap">
                    <div class="latestTasks">
                        <div class="latestTasksHeader">
                            <h3>Tasks that need to be finished</h3>
                        </div>
                        @if($sum > 0)
                            <div class="latestTasksBody">
                            @foreach ($latestTasks as $latestTask)
                                <p>{{ $latestTask->name }}</p>
                            @endforeach
                        </div>
                        @else
                            <div class="noTasks">You've finished all your tasks</div>
                        @endif
                        <div class="latestTasksFooter">
                            <a href="/tasks">See all tasks</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
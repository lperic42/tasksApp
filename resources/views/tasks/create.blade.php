@extends('layouts.app')

@section('content')

            <div class="createTaskWrap">
                <div class="createTask">
                    <h3 class="header">Create a new task</h3>
                    <form class="createTask" method="POST" action="">
                    {{ csrf_field() }}
                        <input type="text" class="inputField" name="name" id="name" placeholder="What are you up to today?"><br>
                        <span class="error">@error('name') {{ $message }} @enderror</span>
                        <button type="submit" class="save">Create</button>
                    </form>
                </div>
            </div>

@endsection
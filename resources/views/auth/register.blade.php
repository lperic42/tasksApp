@extends('layouts.app')

@section('content')
    <form action="{{ route('save') }}" method="POST" >
        @csrf

        <div class="registerWrap">
            <div class="register">
                <div class="registerHeading">
                    <h2>Register</h2>
                </div>
                <div class="registerForm">
                    <strong>Name:</strong>
                    <input type="text" placeholder="Name" id="name" class="inputField" name="name" required autofocus><br>
                    
                    <strong>Email:</strong>
                    <input type="text" placeholder="Email" id="email" class="inputField" name="email" required autofocus><br>

                    <strong>Password:</strong>
                    <input type="password" name="password" class="inputField" placeholder="Password">
                    <span class="error">@error('password') {{ $message }} @enderror</span>
                    <span class="error">@error('name') {{ $message }} @enderror</span>
                    <span class="error">@error('email') {{ $message }} @enderror</span>

                    <button type="submit" class="registerBtn">Submit</button>
                </div>
                <div class="registerCTA">
                <small>Already have an account? <a href="/">Sign in!</a></small>
            </div>
            </div>
            </div>
    </form>


@endsection
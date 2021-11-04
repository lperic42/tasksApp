@extends('layouts.app')

@section('content')
    <div class="loginWrap">
        <div class="login">
            <div class="loginHeading">
                <h2>Log in</h2>
            </div>
            <div class="loginForm">
                <form class="loginForm" method="post" action="{{ route('check') }}">

                @if(Session::get('fail'))
                    <div class="alert">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                    <input type="email" class="inputField" name="email" id="email" placeholder="Email"><br>
                    <input type="password" class="inputField" name="password" id="password" placeholder="Password"><br>
                    <span class="error">@error('password') {{ $message }} @enderror</span>
                    <span class="error">@error('email') {{ $message }} @enderror</span>
                    <button type="submit" class="loginBtn">Sign in</button>
                </form>
            </div>
            <div class="registerCTA">
                <small>Don't have an account? <a href="/register">Register here!</a></small>
            </div>
        </div>
    </div>
@endsection
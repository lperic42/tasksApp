@extends('layouts.app')

@section('content')
    <div class="mainWrap">
        <div class="headerWrap">
            <div class="header">
                <a href="{{ url('login') }}" class="loginBtn">Log in</a>
            </div>
        </div>
        <div class="bodyWrap">
            <div class="body">
                <h1>Welcome to Peco App</h1>
                <p>See what you're up to today!</p>
            </div>
        </div>
    </div>
@endsection
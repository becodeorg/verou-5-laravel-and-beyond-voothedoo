@extends('layouts.layout')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <div class="greetings">
            @auth
                <h1 class="greet-user">Welcome, <span class="user-span">{{ auth()->user()->name }}</span>!</h1>
            @endauth

            @guest
                <h1 class="greet-user">Welcome, <span class="user-span">Guest</span>!</h1>
                <p class="under-greet"> <a href="/register">Sign In</a></p>
            @endguest
        </div>

    </main>
@endsection

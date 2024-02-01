@extends('layouts.layout')

@section('title')
    Home
@endsection

@section('content')
    <main>
        @auth
            <p>Hello, {{ auth()->user()->name }}
            @endauth

            @guest
            <p>Welcome, Guest</p>
            <p>Please Login</p>
        @endguest
    </main>
@endsection

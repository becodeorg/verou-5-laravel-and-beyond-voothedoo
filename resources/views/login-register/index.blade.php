@extends('layouts.layout')

@section('title')
    Login/Register
@endsection

@section('content')
    <main>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-register">
            <div class="register">
                <form action="{{ route('registerCreate') }}" class="registration-form" method="POST">
                    @csrf
                    @method('POST')
                    <h2>Register here</h2>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                    <button type="submit">Register</button>
                </form>
            </div>

            <div class="login">
                <form action="{{ route('login') }}" class="login-form" method="POST">
                    @csrf
                    <h2>Already an user?</h2>
                    <label for="cc">Username: </label>
                    <input type="text" name="login-username" id="login-username">
                    <label for="login-password">Password: </label>
                    <input type="password" name="login-password" id="login-password">
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </main>
@endsection

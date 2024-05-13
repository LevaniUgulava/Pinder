@extends('layouts.AuthForm')
@section('content')

<style>
    /* Additional styles for positioning the login link */
    a.link {
        position: absolute;
        top: 10px;
        right: 10px;
        text-decoration: none;
        color: #333; /* Adjust the color as needed */
    }
</style>

<a href="{{ url('/register') }}" class="link">Register</a>

@if(session('message'))
    <div class="success-message" style="display: block;">
        {{ session('message') }}
    </div>
@endif

<form action="{{route('user.auth')}}" method="post">
    @csrf
    <h2>Login</h2>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Log in</button>
    <a href="{{url('/')}}">Back</a>

</form>

@endsection

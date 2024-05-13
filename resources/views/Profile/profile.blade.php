@extends('layouts.ProfileForm')

@section('content')


@if(session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div style="margin: 20px; display: flex;">
    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" style="width: 300px; height: 30px; padding: 8px; border: 1px solid #ccc; border-radius: 5px; outline: none; font-size: 14px; transition: border-color 0.3s ease;" value="{{ $user->name }}">
        <br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" style="width: 300px; height: 30px; padding: 8px; border: 1px solid #ccc; border-radius: 5px; outline: none; font-size: 14px; transition: border-color 0.3s ease;" value="{{ $user->email }}">
        <br><br>
        <label for="image">Image:</label><br>
        <input type="file" name="image" id="image" style="width: 300px; height: 30px; padding: 8px; border: 1px solid #ccc; border-radius: 5px; outline: none; font-size: 14px; transition: border-color 0.3s ease;" value="{{ $user->email }}">
        <br><br>
        <button type="submit" style="padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </form>

    @if($user->profileimg && $user->profileimg->image)
<label>Profile Picture:</label><br>
    <img src="{{asset('/images/ProfilePicture/'.$user->profileimg->image)}}" alt="Image" style="height: 150px; margin-left: 20px;">
</div>
@endif

@endsection

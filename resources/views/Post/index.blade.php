@extends('layouts.ProfileForm')
@section('content')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif


<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" class="form-control">
    @error('name')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror

    <label>Description:</label>
    <textarea name="description" class="form-control"></textarea>
    @error('description')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror
    <label>Color:</label>
    <input type="text" name="color" class="form-control">
    @error('color')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror
    <label>Age:</label>
    <input type="number" name="age" class="form-control">
    @error('age')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror
<label>Breed:</label>
    <select name="breed" class="form-control">
    <option selected >Choose Breed...</option>


@foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->breed}}</option>
          @endforeach
    </select>
    @error('breed')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror
    <label>Image:</label>
    <input type="file" name="image" class="form-control">
    @error('image')
    <div class="form-control" style="background:#ffcccc; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
@enderror
    <button class="form-control btn btn-success">
        submit
    </button>


</form>



@endsection

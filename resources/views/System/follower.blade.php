@extends('layouts.ProfileForm')
@section('content')

@isset($users)
@foreach($users as $user)
        {{ $user->name }}
@endforeach
@endisset


@endsection

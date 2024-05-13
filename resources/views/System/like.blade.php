@extends('layouts.ProfileForm')
@section('content')


<style>
    .liked-by-container {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
}

.user-name {
    margin-left: 10px;
}

.no-likes {
    color: #888;
    font-style: italic;
}

</style>


<div class="liked-by-container">
    <b>Liked By:</b>

    @forelse($post->users as $user)
        <p class="user-name">{{ $user->name }}</p>
    @empty
        <p class="no-likes">No one has liked this post yet</p>
    @endforelse
</div>






@endsection

@extends('layouts.ProfileForm')
@section('content')
<style>
    /* styles.css */

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Adjust the gap between cards as needed */
        justify-content: space-between; /* Adjust alignment as needed */
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px; /* Adjust the width as needed */
    }

    .card-image {
        width: 100%;
        height: auto;
        max-height: 200px; /* Adjust the max-height as needed */
    }

    .card-content {
        padding: 15px;
    }

    .card-name {
        margin-top: 0;
        font-size: 1.5rem;
    }

    .card-details {
        margin-bottom: 8px;
    }
    .no-posts {
    text-align: center;
    margin-top: 20px;
    font-size: 1.2rem;
    color: #555;
    padding: 15px;
    border: 2px dashed #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    max-width: 400px;
    margin: 20px auto;
}
</style>
<h1>My Posts:</h1>
<div class="card-container">
@forelse ($posts as $post)
    <div class="card">
        @foreach ($post->images as $image)
            <img src="{{ asset('/images/PostPicture/' . $image->image) }}" class="card-image" alt="Post Image">
        @endforeach
        <div class="card-content">
            <h2 class="card-name">Name: {{ $post->name }}</h2>
            <p class="card-details">Breed: {{ $post->category->breed }}</p>
            <p class="card-details">Age: {{ $post->age }}</p>
            <p class="card-details">Color: {{ $post->color }}</p>
            <b><a href="{{ route('who.like', $post->id) }}">Liked: {{ $post->users_count }}</a></b>
        </div>
    </div>
@empty
    <p class="no-posts">You haven't got any posts.</p>
@endforelse

</div>
    @foreach($notifications as $notify)
        @php
            $notificationData = json_decode($notify->data, true);
        @endphp

        {{-- Check if 'like_notification_data' exists in the decoded data --}}
        @if (isset($notificationData['like_notification_data']))
                {{ $notificationData['like_notification_data'] }}
                @if(isset($notificationData['url']))

                     <a href="{{$notificationData['url'] }}">accept</a>


                @endif
        @endif
    @endforeach



@endsection

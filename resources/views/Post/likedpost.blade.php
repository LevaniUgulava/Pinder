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

<h1>Liked Posts:</h1>
<div class="card-container">
    @forelse($posts as $post)
    @if(auth()->user() && auth()->user()->postss->contains($post->id))
        <div class="card">
            @foreach($post->images as $image)
                <img src="{{ asset('/images/PostPicture/' . $image->image) }}" class="card-image">
            @endforeach
            <div class="card-content">
                <h2 class="card-name">Name: {{ $post->name }}</h2>
                <p class="card-details">Breed: {{ $post->category->breed }}</p>
                <p class="card-details">Age: {{ $post->age }}</p>
                <p class="card-details">Color: {{ $post->color }}</p>

         <form action="{{route('unlike',$post->id)}}" method="post">
            @csrf
            <button>
                unlike
            </button>
        </form>

            </div>
        </div>
@endif
    @empty

    <p class="no-posts">You haven't got any posts.</p>

    @endforelse
</div>



@endsection

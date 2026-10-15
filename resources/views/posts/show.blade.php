@extends('layouts.app')

@section('title', 'Show Post')

@section('content')

<div class="container mt-4">

    {{-- Post Info --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Post Info</h5>
        </div>

        <div class="card-body">
            <h4 class="card-title mb-3">
                {{ $post->title }}
            </h4>

            <p class="card-text">
                {{ $post->description }}
            </p>
        </div>
    </div>

    {{-- Post Creator Info --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Post Creator Info</h5>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <strong>Name:</strong>
                {{$post->user ? $post->user->name : "not found" }}
            </div>

            <div class="mb-3">
                <strong>Email:</strong>
                {{$post->user ? $post->user->email : "not found" }}
            </div>

            <div>
                <strong>Created At:</strong>
                {{ $post->user ? $post->user->created_at : "not found" }}
            </div>
        </div>
    </div>

    <a href="{{ url('/posts') }}" class="btn btn-primary">
        Back to Posts
    </a>

</div>

@endsection

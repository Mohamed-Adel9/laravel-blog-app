@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    {{-- Create Post Button --}}
    <div class="text-center mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success">
            Create Post
        </a>
    </div>

    {{-- Posts Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user ? $post->user->name : 'not found' }}</td>
                        <td>{{ $post->created_at }}</td>

                        <td class="text-nowrap">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

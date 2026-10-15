@extends('layouts.app')

@section('title')
    edit
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Update Post</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PUT')
                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title
                            </label>

                            <input type="text" name="title" id="title" class="form-control "
                                value="{{ $post->title }}" placeholder="Enter post title">

                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Description
                            </label>

                            <textarea name="description" id="description" rows="5" class="form-control "
                                placeholder="Write your post description">{{ $post->description }}</textarea>

                        </div>

                        {{-- Post Creator --}}
                        <div class="mb-4">
                            <label for="posted_by" class="form-label">
                                Post Creator
                            </label>

                            <select  name="posted_by" id="posted_by class="form-select">
                                @foreach ($users as $user)
                                    <option @if ($user->id == $post->user_id) selected @endif value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Actions --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Update Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

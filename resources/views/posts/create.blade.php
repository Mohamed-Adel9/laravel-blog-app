@extends('layouts.app')

@section('title')
    create
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Create New Post</h4>
                </div>

                <div class="card-body">
                    <form method="POST", action="{{ route('posts.store') }}">
                        @csrf
                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title
                            </label>

                            <input type="text" name="title" id="title" class="form-control "
                                value="{{ old('title') }}" placeholder="Enter post title">

                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Description
                            </label>

                            <textarea name="description" id="description" rows="5" class="form-control "
                                placeholder="Write your post description">{{ old('description') }}</textarea>

                        </div>

                        {{-- Post Creator --}}
                        <div class="mb-4">
                            <label for="posted_by" class="form-label">
                                Post Creator
                            </label>

                            <select name="posted_by" id="posted_by" class="form-select">
                                <option value="" disabled {{ old('posted_by') ? '' : 'selected' }}>
                                    Select post creator
                                </option>

                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
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

                            <button type="submit" class="btn btn-success">
                                Create Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

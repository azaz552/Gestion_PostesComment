@extends('layouts.app')

@section('content')

<style>
    body {
        background: #f5f1e9;
    }

    .card-form {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .btn-blue {
        background: #0d3b66;
        color: #f5f1e9;
    }

    .btn-blue:hover {
        background: #092a4a;
        color: white;
    }

    .title {
        color: #0d3b66;
        font-weight: bold;
    }
</style>

<div class="container">
    {{-- RETOUR BUTTON --}}
    <a href="{{ route('posts.index') }}" class="btn btn-blue mb-3">
        ← Retour
    </a>
    <h2 class="title mb-4">➕ Create New Post</h2>

    <div class="card card-form p-4">

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Enter title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content"
                          rows="5"
                          class="form-control"
                          placeholder="Write content..."></textarea>

                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-blue">
                Save Post
            </button>

            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection
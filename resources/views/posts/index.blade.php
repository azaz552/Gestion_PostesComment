@extends('layouts.app')

@section('content')

<style>
    .page-title {
        color: #0d3b66;
        font-weight: bold;
    }

    .post-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .post-card:hover {
        transform: translateY(-5px);
    }

    .btn-blue {
        background-color: #0d3b66;
        color: #f5f1e9;
    }

    .btn-blue:hover {
        background-color: #092a4a;
        color: #fff;
    }

    body {
        background-color: #f5f1e9; /* beige */
    }
</style>

<div class="container">

    <h2 class="page-title mb-4">📚 Posts List</h2>

    <!-- Search -->
    <form method="GET" action="{{ route('posts.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search posts..."
                   value="{{ request('search') }}">

            <button class="btn btn-blue">
                Search
            </button>
        </div>
    </form>

    <!-- Create Button -->
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-blue">
            + Create Post
        </a>
    </div>

    <!-- Posts Grid -->
    <div class="row">

        @foreach($posts as $post)
            <div class="col-md-4 mb-4">

                <div class="post-card p-3 h-100">

                    <!-- Image -->
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}"
                             class="img-fluid rounded mb-3"
                             style="height:180px; width:100%; object-fit:cover;">
                    @endif

                    <!-- Title -->
                    <h5 style="color:#0d3b66;">
                        {{ $post->title }}
                    </h5>

                    <!-- Content -->
                    <p class="text-muted">
                        {{ Str::limit($post->content, 100) }}
                    </p>

                    <!-- Actions -->
                    <a href="{{ route('posts.show', $post) }}"
                       class="btn btn-sm btn-blue">
                        View
                    </a>

                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('⚠️ Voulez-vous vraiment supprimer ce post ?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>

                        </form>
                    @endcan

                </div>

            </div>
        @endforeach

    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $posts->links() }}
    </div>

</div>

@endsection
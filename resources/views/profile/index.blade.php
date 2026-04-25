@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #f5f1e8, #dbe9f4);
    }

    .profile-card {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border-top: 5px solid #2c6e9b;
    }

    .avatar {
        width: 110px;
        height: 110px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #2c6e9b;
    }

    .username {
        color: #2c6e9b;
        font-weight: bold;
    }

    .bio {
        color: #6c6c6c;
    }

    .section-title {
        color: #2c6e9b;
        font-weight: 600;
        margin-top: 25px;
    }

    .post-box {
        background: #f9f6ef;
        border-left: 4px solid #d6c6a8;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .btn-blue {
        background: #2c6e9b;
        color: white;
        border-radius: 8px;
    }

    .btn-blue:hover {
        background: #245a7f;
        color: white;
    }
</style>

<div class="container py-5">

    <div class="profile-card text-center">

        {{-- AVATAR --}}
        @if($user->avatar)
            <img src="{{ asset('storage/'.$user->avatar) }}" class="avatar mb-3">
        @else
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="avatar mb-3">
        @endif

        {{-- NAME --}}
        <h2 class="username">{{ $user->name }}</h2>

        {{-- EMAIL --}}
        <p class="text-muted">{{ $user->email }}</p>

        {{-- BIO --}}
        <p class="bio">{{ $user->bio ?? 'No bio yet' }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-blue mt-2">
            Edit Profile
        </a>

        <hr>

        {{-- POSTS --}}
        <h4 class="section-title">My Posts</h4>

        @forelse($user->posts as $post)
            <div class="post-box text-start">
                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                    {{ $post->title }}
                </a>
            </div>
        @empty
            <p class="text-muted">No posts yet</p>
        @endforelse

    </div>

</div>

@endsection
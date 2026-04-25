@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f1e8; /* beige clair */
    }

    .post-container {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border-left: 6px solid #2c6e9b; /* bleu pro */
    }

    .post-title {
        color: #2c6e9b;
        font-weight: 700;
    }

    .post-content {
        color: #5a5a5a;
        font-size: 16px;
        line-height: 1.6;
    }

    .comment-box {
        background: #f9f6ef;
        border-left: 4px solid #d6c6a8;
        padding: 12px;
        border-radius: 8px;
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

    .section-title {
        color: #2c6e9b;
        font-weight: 600;
        margin-top: 30px;
    }
</style>

<div class="container py-4">
    {{-- RETOUR BUTTON --}}
    <a href="{{ route('posts.index') }}" class="btn btn-blue mb-3">
        ← Retour
    </a>
    {{-- POST --}}
    <div class="post-container mb-4">

        <h2 class="post-title">{{ $post->title }}</h2>

        {{-- IMAGE --}}
        @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}"
                 class="img-fluid rounded mb-3"
                 style="max-height:400px; object-fit:cover;">
        @endif

        <p class="post-content">
            {{ $post->content }}
        </p>

        <hr>

        <small class="text-muted">
            Créé par <strong>{{ $post->user->name ?? 'Utilisateur' }}</strong>
        </small>
    </div>

    {{-- COMMENTAIRES --}}
    <h4 class="section-title">Commentaires</h4>

    @forelse($post->comments as $comment)
        <div class="comment-box">
            <strong>{{ $comment->user->name ?? 'User' }}</strong>
            <p class="mb-0">{{ $comment->content }}</p>

            @if($comment->image)
                <img src="{{ asset('storage/'.$comment->image) }}"
                     class="img-fluid mt-2 rounded"
                     style="max-width:200px;">
            @endif
        </div>
    @empty
        <p class="text-muted">Aucun commentaire pour le moment.</p>
    @endforelse

    {{-- FORM COMMENTAIRE --}}
    <h4 class="section-title">Ajouter un commentaire</h4>

    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-4 rounded shadow-sm">
        @csrf

        <input type="hidden" name="type" value="post">
        <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="mb-3">
            <label>Commentaire</label>
            <textarea name="content" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Image (optionnel)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-blue px-4">
            Envoyer
        </button>
    </form>

</div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();

        // upload image si existe
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('comments', 'public');
        }

        // récupérer le modèle (Post ou Video)
        if ($data['type'] === 'post') {
            $commentable = Post::findOrFail($data['id']);
        } else {
            $commentable = Video::findOrFail($data['id']);
        }

        // création du commentaire polymorphique
        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->user_id = Auth::id();

        $commentable->comments()->save($comment);

        return back()->with('success', 'Commentaire ajouté avec succès');
    }
}
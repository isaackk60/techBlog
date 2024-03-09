<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->id();
        $comment->save();

        return back();
    }

    public function update(Request $request, $id)
{
    $comment = Comment::findOrFail($id);

    $request->validate([
        'content' => 'required',
    ]);

    $comment->content = $request->input('content'); 
    $comment->save();

    return back();
}




    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}

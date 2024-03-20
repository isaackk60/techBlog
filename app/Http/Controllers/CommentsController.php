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

        return back()->with('message','Your comment has been added!');
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($request->has('cancelButton')) {
            return back()->with('message','Comment editing canceled.');
            // if have time can try to use redirect() id to comment part 
            //return redirect()->route('route_name', ['#id']);
        }else{

        $request->validate([
            'content' => 'required',
        ]);

        $comment->content = $request->input('content');
        $comment->save();

        return back()->with('message','Your comment has been updated!');
    }
    }




    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message','Your comment has been deleted!');
    }
}

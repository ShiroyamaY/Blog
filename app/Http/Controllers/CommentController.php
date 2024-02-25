<?php

namespace App\Http\Controllers;

use App\Http\Requests\Personal\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(int $postId,CommentRequest $request)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $postId,
            'content' => $request->validated('content'),
        ]);
        return redirect()->route('posts.show',['post' => $postId]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $postId,Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $postId,Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $postId,Comment $comment)
    {
        //
    }
}

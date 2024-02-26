<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $comments = auth()->user()
            ->comments()
            ->with(['post' => fn($q) => $q->withTrashed()])
            ->paginate(6);
        return view('personal.comments.index',compact('comments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $successUpdate = Session::get('successUpdate');
        return view('personal.comments.edit',compact('comment','successUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): RedirectResponse
    {
        $comment->content = $request->validated('content');
        $comment->save();
        Session::flash('successUpdate');
        return redirect()->route('personal.comments.edit',compact('comment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->route('personal.comments.index');
    }
}

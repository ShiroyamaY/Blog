<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount('comments')->paginate(6);
        $mostLikedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')
            ->take(3)
            ->get();

        return view('posts.index',compact('posts','mostLikedPosts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $comments = $post->comments()->with('user')->paginate(6);
        $relatedPosts = Post::with('category')
            ->where('category_id',$post->category_id)
            ->where('id','!=',$post->id)
            ->paginate(3);

        return view('posts.show',compact('post','date','relatedPosts','comments'));
    }


}

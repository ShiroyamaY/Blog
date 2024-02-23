<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController
{
    public function index(){
        $posts = Post::paginate(6);
        $mostLikedPosts = Post::withCount('likedUsers')
            ->orderBy('liked_users_count','DESC')
            ->take(3)->get();
        return view('main.index',compact('posts','mostLikedPosts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $postId,Request $request): RedirectResponse
    {
        auth()->user()->likedPosts()->toggle($postId);
        return redirect()->back();
    }
}

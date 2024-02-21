<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        $likedPostsCount = auth()->user()->likedPosts->count();
        $userCommentsCount = auth()->user()->comments->count();
        return view('personal.main.index',compact('likedPostsCount','userCommentsCount'));
    }
}

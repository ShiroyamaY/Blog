<?php

namespace App\Http\Controllers;

class MainController
{
    public function index(){
        return redirect()->route('posts.index');
    }
}

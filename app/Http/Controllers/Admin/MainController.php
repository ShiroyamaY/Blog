<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{

    public function index(): View
    {
        $usersCount = User::all()->count();
        $postsCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        $tagsCount = Tag::all()->count();
        return view('admin.main.index', compact(
            'usersCount',
                'postsCount',
                'categoriesCount',
                'tagsCount'
            )
        );
    }
}

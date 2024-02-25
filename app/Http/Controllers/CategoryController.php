<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        $posts = $category->posts()->paginate(6);
        return view('categories.show',compact('category','posts'));
    }
}

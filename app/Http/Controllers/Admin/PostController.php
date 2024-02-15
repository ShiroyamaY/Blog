<?php

namespace App\Http\Controllers\Admin;

use App\DTO\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PostController extends Controller
{
    private PostService $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $posts = $this->postService->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categories = Category::all();
        $tags = Tag::all();
        $successStore = session('successStore');
        return view('admin.posts.create',compact('successStore','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request): RedirectResponse
    {
        $this->postService->store(
            PostDto::getFromPostRequest($request)
        );
        session()->flash('successStore');
        return redirect()->route('admin.posts.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) : View
    {
        $categories = Category::all();
        $tags = Tag::all();
        $successUpdate = Session::get('successUpdate');
        return view('admin.posts.edit',compact('post','successUpdate','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $this->postService->update(
            PostDto::getFromPostRequest($request),
            $post
        );
        Session::flash('successUpdate');
        return redirect()->route('admin.posts.edit',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postService->destroy($post);
        return redirect()->route('admin.posts.index');
    }
}

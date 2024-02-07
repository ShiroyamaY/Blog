<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class TagController extends Controller
{
    private TagService $tagService;
    public function __construct(TagService $tagService){
        $this->tagService = $tagService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $tags = $this->tagService->get();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $successStore = session('successStore');
        return view('admin.tags.create',compact('successStore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): RedirectResponse
    {
        $this->tagService->store($request->validated('title'));
        session()->flash('successStore');
        return redirect()->route('admin.tags.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): View
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag) : View
    {
        $successUpdate = Session::get('successUpdate');
        return view('admin.tags.edit',compact('tag','successUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $this->tagService->update($request->validated('title'),$tag);
        Session::flash('successUpdate');
        return redirect()->route('admin.tags.edit',compact('tag'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $this->tagService->destroy($tag);
        return redirect()->route('admin.tags.index');
    }
}

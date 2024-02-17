<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    /**
     *  get all tags
     */
    public function get(): Collection
    {
        return Tag::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(string $title)
    {
        return Tag::firstOrCreate([
            'title' => $title
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function getOne(string $id)
    {
        return Tag::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $title,Tag $tag)
    {
        return $tag->update([
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): int
    {
        return Tag::destroy($tag->id);
    }
}

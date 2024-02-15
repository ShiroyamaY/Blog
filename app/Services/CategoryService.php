<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function get(): Collection
    {
        return Category::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(string $title)
    {
        return Category::firstOrCreate([
            'title' => $title
        ]);
    }


    public function getOne(string $id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $title,Category $category)
    {
        return $category->update([
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): int
    {
        return Category::destroy($category->id);
    }
}

<?php

namespace App\Services;

use App\DTO\PostDto;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    /**
     * Get all posts
     */
    public function get(): Collection
    {
        return Post::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostDto $postDto)
    {
        try {
            DB::beginTransaction();
            if ($postDto->previewImage){
                $postDto->previewImage = Storage::disk('public')->putFile('/images',$postDto->previewImage);
            }
            if ($postDto->mainImage){
                 $postDto->mainImage = Storage::disk('public')->putFile('/images',$postDto->mainImage);
            }
            $post = Post::firstOrCreate([
                'title' => $postDto->title,
                'content' => $postDto->content,
                'category_id' => $postDto->categoryId,
                'preview_image' => $postDto->previewImage,
                'main_image' => $postDto->mainImage,
            ]);
            $post->tags()->attach($postDto->tags);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */


    public function getOne(string $id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostDto $postDto,Post $post): void
    {
        try {
            DB::beginTransaction();
            if ($postDto->previewImage) {
                $postDto->previewImage = Storage::disk('public')->putFile('/images', $postDto->previewImage);
            }else{
                $postDto->previewImage = $post->preview_image;
            }
            if ($postDto->mainImage){
                $postDto->mainImage = Storage::disk('public')->putFile('/images',$postDto->mainImage);
            }else{
                $postDto->mainImage = $post->main_image;
            }
            $post->update([
                'title' => $postDto->title,
                'content' => $postDto->content,
                'preview_image' => $postDto->previewImage,
                'main_image' => $postDto->mainImage,
                'category_id' => $postDto->categoryId,
            ]);
            $post->tags()->sync($postDto->tags);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): int
    {
        return Post::destroy($post->id);
    }
}

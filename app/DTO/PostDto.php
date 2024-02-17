<?php

namespace App\DTO;

use App\Http\Requests\Admin\Post\PostRequest;

class PostDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?string $categoryId,
        public ?string $previewImage,
        public ?string $mainImage,
        public readonly ?array $tags
    ){

    }
    public static function getFromPostRequest(PostRequest $postRequest): PostDto
    {
        $data = $postRequest->validated();
        return new self(
            $data['title'],
            $data['content'],
            $data['category'] ?? null,
            $data['preview_image'] ?? null,
            $data['main_image'] ?? null,
            $data['tags'] ?? null
        );
    }
}

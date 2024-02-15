@php
    use App\Models\Post;
     /**
    *   @var Post $post
    */
@endphp
@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="text-success fa-solid fa-pen-to-square">
        <x-slot:title>Edit post
        </x-slot:title>
    </x-admin.content-header>
    <div class="container d-flex flex-column align-items-center">
        @if($successUpdate)
            <div class="alert alert-success">
                Post successfully updated.
            </div>
        @endif
        <form enctype="multipart/form-data" class="w-50" method="POST"
              action="{{route('admin.posts.update',compact('post'))}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title" class="w-100">
                    <span class="size-26">Title:</span><input class="form-control" type="text" name="title" id="title"
                                                              value="{{old('title') ? old('title'): $post->title}}">
                </label>
            </div>
            @error('title')
            <div class="mb-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="content" class="w-100">
                    <span class="d-block mb-3">Content:</span>
                    <textarea id="summernote"
                              name="content">{{old('content') ? old('content'): $post->content}}</textarea>
                </label>
                @error('content')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="exampleInputFile">Preview image</label>
                <div class="input-group">
                    <div class="w-100 mb-3">
                        <img src="{{url("storage/{$post->preview_image}")}}" alt="preview image" class="w-100">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile"
                               value="{{url("storage/{$post->preview_image}")}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('preview_image')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="exampleInputFile">Main image</label>
                <div class="w-100 mb-3">
                    <img src="{{url("storage/{$post->main_image}")}}" alt="main image" class="w-100">
                </div>
                <div class="input-group">
                    <div class="custom-file ">

                        <input type="file" class="custom-file-input" name="main_image" id="exampleInputFile"
                               value="{{url("storage/{$post->main_image}")}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('main_image')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category" class="d-flex flex-column w-100">
                    <span class="mb-3">Category:</span>
                    <select class="custom-select" name="category" id="category">
                        @foreach($categories as $category)
                            <option
                                {{$category->id === $post->category_id ? 'selected' : ''}} value="{{$category->id}}">
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </label>
                @error('category')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select tags"
                        style="width: 100%;">
                    @foreach($tags as $tag)
                        <option {{ $post->tags->pluck('id')->toArray() && in_array($tag->id, $post->tags->pluck('id')->toArray())
                                                ? 'selected'
                                                : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tags')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="d-grid form-group">
                <input class="form-control btn btn-primary" type="submit" value="Update Post">
            </div>
        </form>
        <div class="mt-3">
            <a href="{{route('admin.posts.index')}}" class="btn btn-outline-primary">See all posts</a>
        </div>

    </div>
@endsection

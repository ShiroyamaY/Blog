@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="fa-solid fa-list">
        <x-slot:title>
            Create post
        </x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
        <li class="breadcrumb-item">Create post</li>
    </x-admin.content-header>
<div class="container d-flex flex-column align-items-center">
    @if($successStore)
        <div class="alert alert-success">
            Post successfully added.
        </div>
    @endif
    <form enctype="multipart/form-data" class="w-50" action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" class="w-100">
                <span class="size-26">Title:</span><input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
            </label>
            @error('title')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" class="w-100">
                <span class="d-block mb-3">Content:</span>
                <textarea id="summernote" name="content">{{old('content')}}</textarea>
            </label>
            @error('content')
            <div class="mt-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Preview image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile" value="">
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
        <div class="form-group">
            <label for="exampleInputFile">Main image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image" id="exampleInputFile" value="">
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
                        <option value="{{$category->id}}">{{$category->title}}</option>
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
            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                    @foreach($tags as $tag)
                            <option {{is_array(old('tags')) && in_array($tag->id,old('tags')) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
            </select>
            @error('tags')
                <div class="mt-2 alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="d-grid form-group">
                <input class="form-control btn btn-primary" type="submit" value="Create Post">
        </div>
    </form>
        <div class="mt-3">
            <a href="{{route('admin.posts.index')}}" class="btn btn-outline-primary">See all posts</a>
        </div>
</div>
@endsection

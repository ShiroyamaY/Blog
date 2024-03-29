@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="text-success fa-solid fa-pen-to-square">
        <x-slot:title>Edit category
        </x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item">Edit category</li>
    </x-admin.content-header>
    <div class="container d-flex flex-column align-items-center">
        @if($successUpdate)
            <div class="alert alert-success">
                Category successfully updated.
            </div>
        @endif
        <form class="w-25" method="POST" action="{{route('admin.categories.update',compact('category'))}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="w-100">
                    <span class="size-26">Title:</span><input class="form-control" type="text" name="title" id="title" value="{{old('title') ? old('title'): $category->title}}">
                </label>
            </div>
            @error('title')
            <div class="mb-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Update Category">
            </div>
        </form>
        <div class="mt-3">
            <a href="{{route('admin.categories.index')}}" class="btn btn-outline-primary">See all categories</a>
        </div>

    </div>
@endsection

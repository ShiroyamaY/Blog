@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="fa-solid fa-list">
        <x-slot:title>
            Create tag
        </x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">tags</a></li>
        <li class="breadcrumb-item">Create tag</li>
    </x-admin.content-header>
<div class="container d-flex flex-column align-items-center">
    @if($successStore)
        <div class="alert alert-success">
            Tag successfully added.
        </div>
    @endif
    <form class="w-25" action="{{route('admin.tags.store')}}" method="POST">
        @csrf
        <div class="mb-3 ">
            <label for="title" class="w-100">
                <span class="size-26">Title:</span><input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
            </label>
            @error('title')
                <div class="mb-2 alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Create Tag">
        </div>
    </form>
        <div class="mt-3">
            <a href="{{route('admin.tags.index')}}" class="btn btn-outline-primary">See all tags</a>
        </div>

</div>
@endsection

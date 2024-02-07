@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="text-success fsuccessa-solid fa-pen-to-square">
        <x-slot:title>Edit tag
        </x-slot:title>
    </x-admin.content-header>
    <div class="container d-flex flex-column align-items-center">
        @if($successUpdate)
            <div class="alert alert-success">
                Tag successfully updated.
            </div>
        @endif
        <form class="w-25" method="POST" action="{{route('admin.tags.update',compact('tag'))}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="w-100">
                    <span class="size-26">Title:</span><input class="form-control" type="text" name="title" id="title" value="{{old('title') ? old('title'): $tag->title}}">
                </label>
            </div>
            @error('title')
            <div class="mb-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Update Tag">
            </div>
        </form>
        <div class="mt-3">
            <a href="{{route('admin.tags.index')}}" class="btn btn-outline-primary">See all tags</a>
        </div>

    </div>
@endsection

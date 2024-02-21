@extends('personal.layouts.main')
@section('content')
    <x-personal.content-header iconClasses="text-success fa-solid fa-pen-to-square">
        <x-slot:title>Edit comment
        </x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('personal.comments.index')}}">Сomments</a></li>
        <li class="breadcrumb-item">Edit comment</li>
    </x-personal.content-header>
    <div class="container d-flex flex-column align-items-center">
        @if($successUpdate)
            <div class="alert alert-success">
                Comment successfully updated.
            </div>
        @endif
        <form class="w-25" method="POST" action="{{route('personal.comments.update',compact('comment'))}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="w-100">
                    <span class="size-26">Content:</span><input class="form-control" type="text" name="content" id="content" value="{{old('content') ? old('content'): $comment->content}}">
                </label>
            </div>
            @error('content')
            <div class="mb-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Update Comment">
            </div>
        </form>
        <div class="mt-3">
            <a href="{{route('personal.comments.index')}}" class="btn btn-outline-primary">See all comments</a>
        </div>

    </div>
@endsection

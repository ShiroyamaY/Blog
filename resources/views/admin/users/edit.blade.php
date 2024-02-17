@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="text-success fsuccessa-solid fa-pen-to-square">
        <x-slot:title>Edit user
        </x-slot:title>
    </x-admin.content-header>
    <div class="container d-flex flex-column align-items-center">
        @if($successUpdate)
            <div class="alert alert-success">
                User successfully updated.
            </div>
        @endif
        <form class="w-25" method="POST" action="{{route('admin.users.update',compact('user'))}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="w-100">
                    <span class="font-weight-bold">Name:</span><input class="form-control" type="text" name="name" id="name" value="{{old('name') ? old('name'): $user->name}}">
                </label>
            </div>
            @error('name')
                <div class="mb-2 alert alert-danger">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="email" class="w-100">
                    <span class="font-weight-bold">Email:</span><input class="form-control" type="text" name="email" id="email" value="{{old('email') ? old('email'): $user->email}}">
                </label>
            </div>
            @error('email')
            <div class="mb-2 alert alert-danger">
                {{$message}}
            </div>
            @enderror

            <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Update User">
            </div>
        </form>
        <div class="mt-3">
            <a href="{{route('admin.users.index')}}" class="btn btn-outline-primary">See all users</a>
        </div>

    </div>
@endsection

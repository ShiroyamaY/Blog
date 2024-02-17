@extends('admin.layouts.main')
@section('content')
@include('admin.includes.content-header')
<div class="container d-flex flex-column align-items-center">
    @if($successStore)
        <div class="alert alert-success">
            User successfully added.
        </div>
    @endif
    <form class="w-25" action="{{route('admin.users.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="w-100">
                <span class="font-weight-bold">Name:</span><input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
            </label>
        </div>
        @error('name')
        <div class="mb-2 alert alert-danger">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="email" class="w-100">
                <span class="font-weight-bold">Email:</span><input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
            </label>
        </div>
        @error('email')
        <div class="mb-2 alert alert-danger">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="password" class="w-100">
                <span class="font-weight-bold">Password:</span><input class="form-control" type="password" name="password" id="password" >
            </label>
        </div>
        @error('password')
        <div class="mb-2 alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
            <label for="password_confirmation" class="w-100">
                <span class="font-weight-bold">Confirm password:</span><input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            </label>
        </div>
        @error('password_confirmation')
        <div class="mb-2 alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="d-grid mb-3">
                <input class="form-control btn btn-primary" type="submit" value="Create User">
        </div>
    </form>
        <div class="mt-3">
            <a href="{{route('admin.users.index')}}" class="btn btn-outline-primary">See all users</a>
        </div>

</div>
@endsection

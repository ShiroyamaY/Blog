@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="far fa-eye">
        <x-slot:title>Show category</x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item">{{$category->title}}</li>
    </x-admin.content-header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid w-50 d-flex flex-column align-items-center">
            <div class="flex-grow-1 w-100 mb-3">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                    </tr>
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            {{$category->title}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w-100 mb-3">
                <a href="{{route('admin.categories.edit',$category)}}" class="flex-grow-1 w-100 btn btn-outline-primary">Edit</a>
            </div>
            <div class="w-100 mb-3">
                <form method="POST" action="{{route('admin.categories.destroy',$category)}}">
                    @csrf
                    @method('DELETE')
                    <label class="w-100">
                        <input type="submit" class="flex-grow-1 w-100 btn btn-outline-primary" value="Destroy"/>
                    </label>
                </form>
            </div>
            <div class="mt-3">
                <a href="{{route('admin.categories.index')}}" class="btn btn-outline-primary">See all categories</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


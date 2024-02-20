@extends('admin.layouts.main')
@section('content')


    <x-admin.content-header iconClasses="fa-solid fa-list">
        <x-slot:title>
            Categories
        </x-slot:title>
        <li class="breadcrumb-item">Categories</li>
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid  d-flex flex-column align-items-center">
            <table class="table table-bordered table-sm">
                <tr>
                    <th>Id</th>
                    <th class="fon">Title</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>
                            <a href="{{route('admin.categories.show',['category'=>$category->id])}}">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.categories.edit',compact('category'))}}">
                                <i class="fa-solid fa-pen-to-square" style="color: #0cb683;"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.categories.destroy',$category)}}">
                                @csrf
                                @method('DELETE')
                                <label>
                                    <button type="submit" class="border-0"><i class="text-danger bg- fa-solid fa-trash"></i></button>
                                </label>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create new category</a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

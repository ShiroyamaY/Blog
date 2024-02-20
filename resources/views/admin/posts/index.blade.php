@extends('admin.layouts.main')
@section('content')

    <x-admin.content-header iconClasses="fa-regular fa-clipboard">
        <x-slot:title>
            Posts
        </x-slot:title>
        <li class="breadcrumb-item">Posts</li>
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid  d-flex flex-column align-items-center">
            <table class="table table-bordered table-sm">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{route('admin.posts.show',['post'=>$post->id])}}">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit',compact('post'))}}">
                                <i class="fa-solid fa-pen-to-square" style="color: #0cb683;"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.posts.destroy',$post)}}">
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
            <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create new post</a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

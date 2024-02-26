@extends('personal.layouts.main')
@section('content')

    <x-personal.content-header iconClasses="fa-solid fa-comment">
        <x-slot:title>
            Liked posts
        </x-slot:title>
        <li class="breadcrumb-item">Liked posts</li>
    </x-personal.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid  d-flex flex-column align-items-center">
            <table class="table w-50">
                <tr>
                    <th>Post</th>
                    <th>Delete</th>
                </tr>
                @foreach($likedPosts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            <form method="POST" action="{{route('personal.liked.destroy',$post)}}">
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
            {{$likedPosts->links()}}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

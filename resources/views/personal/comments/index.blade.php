@extends('personal.layouts.main')
@section('content')

    <x-personal.content-header iconClasses="fa-regular fa-clipboard">
        <x-slot:title>
            Comments
        </x-slot:title>
        <li class="breadcrumb-item">Comments</li>
    </x-personal.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid  d-flex flex-column align-items-center">
            <table class="table w-100">
                <tr>
                    <th>Post name</th>
                    <th>Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            @foreach($comments as $comment)
                    <tr>
                        <td>
                            {{$comment->post->title}}
                            @if($comment->post->trashed())
                                <div class="mt-1 alert alert-danger">[Пост был удален]</div>
                            @endif
                        </td>
                        <td>{{$comment->content}}</td>
                        <td>
                            <a href="{{route('personal.comments.edit',compact('comment'))}}">
                                <i class="fa-solid fa-pen-to-square" style="color: #0cb683;"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('personal.comments.destroy',$comment)}}">
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
            {{$comments->links()}}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

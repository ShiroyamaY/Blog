@extends('admin.layouts.main')
@section('content')

    <x-admin.content-header iconClasses="fa-solid fa-tags">
        <x-slot:title>
            Tags
        </x-slot:title>
        <li class="breadcrumb-item">Tags</li>
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
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->title}}</td>
                        <td>
                            <a href="{{route('admin.tags.show',['tag'=>$tag->id])}}">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.tags.edit',compact('tag'))}}">
                                <i class="fa-solid fa-pen-to-square" style="color: #0cb683;"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.tags.destroy',$tag)}}">
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
            <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create new tag</a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="far fa-eye">
        <x-slot:title>Show tag</x-slot:title>
        <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">Tags</a></li>
        <li class="breadcrumb-item">{{$tag->title}}</li>
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
                            {{$tag->id}}
                        </td>
                        <td>
                            {{$tag->title}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w-100 mb-3">
                <a href="{{route('admin.tags.edit',$tag)}}" class="flex-grow-1 w-100 btn btn-outline-primary">Edit</a>
            </div>
            <div class="w-100 mb-3">
                <form method="POST" action="{{route('admin.tags.destroy',$tag)}}">
                    @csrf
                    @method('DELETE')
                    <label class="w-100">
                        <input type="submit" class="flex-grow-1 w-100 btn btn-outline-primary" value="Destroy"/>
                    </label>
                </form>
            </div>
            <div class="mt-3">
                <a href="{{route('admin.tags.index')}}" class="btn btn-outline-primary">See all categories</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


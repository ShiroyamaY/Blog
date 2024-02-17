@extends('admin.layouts.main')
@section('content')

    @include('admin.includes.content-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid  d-flex flex-column align-items-center">
            <table class="table table-bordered table-sm">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.users.show',['user'=>$user->id])}}">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.users.edit',compact('user'))}}">
                                <i class="fa-solid fa-pen-to-square" style="color: #0cb683;"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.users.destroy',$user)}}">
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
            <a href="{{route('admin.users.create')}}" class="btn btn-primary">Create new user</a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

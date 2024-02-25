@extends('layouts.app')
@section('content')
        <div class="breadcumb-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('main.index')}}"><i class="fa fa-home" aria-hidden="true"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Breadcumb Area End ****** -->
        <!-- ****** Categories Area Start ****** -->
        <section class="archive-area mt-3">
            <div class="container d-flex flex-column">
                <ul>
                    @foreach($categories as $category)
                        <li>{{$loop->iteration}}. <a href="{{route('categories.show',compact('category'))}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- ****** Categories Area End ****** -->
@endsection

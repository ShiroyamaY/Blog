@extends('personal.layouts.main')
@section('content')
    <x-personal.content-header iconClasses="fa-solid fa-house">
        <x-slot:title>
            Main
        </x-slot:title>
    </x-personal.content-header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$likedPostsCount}}</h3>
                            <p>Liked posts</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <a href="{{route('personal.liked.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$userCommentsCount}}</h3>

                            <p>Comments</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-comment"></i>
                        </div>
                        <a href="{{route('personal.comments.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

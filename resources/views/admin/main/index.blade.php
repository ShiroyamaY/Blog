@extends('admin.layouts.main')
@section('content')
    <x-admin.content-header iconClasses="fa-solid fa-house">
        <x-slot:title>
            Main
        </x-slot:title>
    </x-admin.content-header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$usersCount}}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$postsCount}}</h3>

                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-clipboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$categoriesCount}}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$tagsCount}}</h3>

                            <p>Tags</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@extends('layouts.app')
@section('content')
    <!-- ****** Header Area End ****** -->

    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('img/bg-img/bg.png')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Archive Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archive Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area mt-3">
        <div class="container">
            <div class="posts__grid row w-100">

                @foreach($posts as $post)
                    <!-- Single Post -->
                    <div class="single-post border-light d-flex flex-column ">
                        <div class="single-post wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="{{url("storage/$post->preview_image")}}" alt="preview image">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content ">
                                <div class="post-meta d-flex flex-column align-items-start">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            {{date("d F Y",strtotime($post->created_at))}}
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite d-flex justify-content-between">
                                            <form class="w-25 d-flex justify-content-between" action="{{route('posts.likes.store',compact('post'))}}" method="POST">
                                                @csrf
                                                <button class="border-0 like-button" type="submit">
                                                    @auth
                                                        @if(auth()->user()->likedPosts->contains($post->id))
                                                            <i class="fa-solid fa-heart"></i>
                                                        @else
                                                            <i class="fa-regular fa-heart"></i>
                                                        @endif
                                                    @endauth
                                                    @guest
                                                        <i class="fa-regular fa-heart"></i>
                                                    @endguest
                                                </button>

                                            </form>
                                            <div class="w-25">
                                                {{$post->liked_users_count}}
                                            </div>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments ml-3">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                                            {{$post->comments_count}}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('posts.show',compact('post'))}}">
                                    <h4 class="post-headline">{{$post->title}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">The most popular posts.</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach($mostLikedPosts as $post)
                                    <figure class="carousel-item {{$loop->first ? 'active': ''}}">
                                        <div class="post-thumb">
                                            <img src="{{url('storage/'.$post->preview_image)}}" alt="First slide">
                                        </div>
                                        <figcaption class="link-black">
                                            <a href="#" class="link-dark">{{$post->title}}</a>
                                        </figcaption>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{$posts->links()}}
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->



    <!-- ****** Footer Social Icon Area Start ****** -->
    <div class="social_icon_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-social-area d-flex flex-wrap">
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>GOOGLE+</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-linkedin-square"
                                           aria-hidden="true"></i><span>linkedin</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Footer Social Icon Area End ****** -->
@endsection

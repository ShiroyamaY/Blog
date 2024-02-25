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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('categories.index')}}">Categories</a></li>
                            <li class="breadcrumb-item active">{{$category->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="archive-area mt-3">
        <div class="container">
            <div class="row d-grid w-100" style="grid-template-columns: repeat(3, 1fr);gap: 16px;display: grid">

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
                        <div class="post-meta d-flex">
                            <div class="post-author-date-area d-flex">
                                <!-- Post Date -->
                                <div class="post-date">
                                    {{date("d F Y",strtotime($post->created_at))}}
                                </div>
                            </div>
                            <!-- Post Comment & Share Area -->
                            <div class="post-comment-share-area w-25 d-flex justify-content-around">
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
                                        {{$post->likedUsers->count()}}
                                    </div>
                                </div>
                                <!-- Post Comments -->
                                <div class="post-comments">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    {{$post->comments->count()}}
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
    </div>
        </div>
    </section>
@endsection

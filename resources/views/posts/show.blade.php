@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="pt-5 pb-5">{{$post->title}}</h1>
        </div>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$date->format("F j")}}, {{$date->year}} • {{$date->format("H:i")}} • Featured • {{$post->comments->count()}} Comments</p>
        <section class="single-post  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="row mb-5 d-flex justify-content-center">
                <div class="col-md-4 mb-3 post-thumb" data-aos="fade-right">
                    <img src="{{url('storage/' . $post->preview_image)}}" alt="blog post" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3 post-thumb" data-aos="fade-up">
                    <img src="{{url('storage/' . $post->main_image)}}" alt="blog post" class="img-fluid">
                </div>
            </div>
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatePost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <div class="post-thumb">
                                        <img src="{{url('storage/' . $relatePost->preview_image)}}" alt="related post">
                                    </div>
                                    <p class="post-category">{{$relatePost->category->title}}</p>
                                    <h5 class="post-title">{{$relatePost->title}}</h5>
                                </div>
                            @endforeach
                        </div>
                        {{$relatedPosts->links()}}
                    </section>
                @endif
                <section class="comment-section">
                    <h3 class="mb-3">Comments({{$post->comments->count()}})</h3>
                    @foreach($comments as $comment)
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="comment">
                                <div class="comment-author">
                                    {{$comment->user->name}}
                                </div>
                                <div class="comment-body">
                                    {{$comment->content}}
                                </div>
                            </div>
                            <div class="comment-date">
                                    {{$comment->created_at->diffForHumans()}}
                            </div>
                        </div>
                    @endforeach
                    <div class="comment-links">
                        {{$comments->links()}}
                    </div>
                    @auth
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{route('posts.comments.store',$post->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="content" class="sr-only">Comment</label>
                                    <textarea name="content" id="content" class="form-control" placeholder="comment" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    @endauth
                </section>
            </div>
        </div>
    </div>


@endsection

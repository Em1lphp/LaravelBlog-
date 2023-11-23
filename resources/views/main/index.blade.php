@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('storage/' .$post->preview_image)}}" alt="blog post">
                            </div>
                            <div  class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                <form action="{{ route('likes.store', $post->id) }}" method="post"> @csrf
                                    <span> {{ $post->liked_users_count }} </span>
                                    <button class="border-0 bg-transparent">
                                        @auth
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart"> </i>
                                            @else
                                                <i class="far fa-heart"> </i>
                                            @endif
                                        @endauth
                                    </button>
                                </form>
                            </div>

                            <a href="{{route('main.show',$post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px;">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <h2>Случайные посты</h2>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                    <a href="{{route('main.show',$post->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">

                    <div class="widget widget-post-list">

                        <h5 class="widget-title">Популярные посты</h5>
                        @foreach($likedPosts as $liked)
                            <ul class="post-list">
                                <li class="post">
                                    <a href="{{route('main.show',$liked->id)}}" class="post-permalink media">
                                        <img src="{{asset('storage/' . $liked->preview_image)}}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$liked->title}}</h6>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        @endforeach
                    </div>
                    <div class="widget p-5">
                        <h5 class="widget-title">Он следит за вами))</h5>
                        <img src="assets/images/Милый котик.jpg" alt="categories" class="w-50">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

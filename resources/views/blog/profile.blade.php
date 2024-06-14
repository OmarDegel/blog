@extends('blog.master')
@section('content')

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <div class="section search-result-wrap">
        <div class="container">

            <div class="row posts-entry">
                <div class="col-lg-8">
                    @foreach ($user->posts as $post)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('showPost',['slug'=>$post->slug]) }}" class="img-link me-4">
                            <img src="{{ asset('imgs/'.$post->path_photo) }}" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <span class="date">{{ $post->created_at }}</span>
                            <h2><a href="{{ route('showPost',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h2>
                            <p>{{ $post->short_description }}</p>
                            <p><a href="{{ route('showPost',['slug'=>$post->slug]) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="sidebar-box search-form-wrap mb-4">

                    </div>



                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ asset('imgs/'.$user->image) }}" alt="Image Placeholder" class="img-fluid mb-3">
                            <div class="bio-body">
                                @auth
                                @if (auth()->user()->id==$user->id)
                                <p><a href="{{ route('edit_your_profile') }}" class="btn btn-primary btn-sm rounded px-1 py-1">Edit Profile</a></p>
                                @endif
                                @endauth


                                <h2>{{ $user->name }}</h2>
                                <p class="mb-4">{{ $user->short_description }}</p>
                                @auth
                                @if (auth()->user()->id==$user->id)
                                <p><a href="{{ route('createPost') }}" class="btn btn-primary btn-sm rounded px-2 py-2">add post</a></p>
                                @endif
                                @endauth

                                <p class="social">
                                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                            @auth
                            @if (auth()->user()->id==$user->id)
                            @livewire('search-user-livewire')

                            @endif
                            @endauth

                        </div>
                        <!-- END sidebar-box -->


                        <!-- END sidebar-box -->


                    </div>
                </div>
            </div>
        </div>
@endsection

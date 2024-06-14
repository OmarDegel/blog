<div>
    <div class="section bg-light">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">

                <div class="col-md-5 order-md-2">
                    <a href="single.html" class="hentry img-1 h-100 gradient">
                        <div class="featured-img" style="background-image: url('images/img_2_vertical.jpg');"></div>
                        <div class="text">
                            <span>February 12, 2019</span>
                            <h2>Meta unveils fees on metaverse sales</h2>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="single.html" class="hentry img-2 v-height mb30 gradient">
                        <div class="featured-img" style="background-image: url('images/img_1_horizontal.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>AI can now kill those annoying cookie pop-ups</h2>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex justify-content-between">
                        <a href="single.html" class="hentry v-height img-2 gradient">
                            <div class="featured-img" style="background-image: url('images/img_2_sq.jpg');"></div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Don’t assume your user data in the cloud is safe</h2>
                            </div>
                        </a>
                        <a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
                            <div class="featured-img" style="background-image: url('images/img_3_sq.jpg');"></div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Startup vs corporate: What job suits you best?</h2>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="container">

            <input type="text" wire:model.lazy='search' class="form-control" placeholder="Search Posts ...">


            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Politics</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{ route('showPost', ['slug' => $post->slug]) }}" class="img-link"><img
                                    src="{{ asset('imgs/' . $post->path_photo) }}" alt="Image" class="img-fluid"></a>
                            <div class="excerpt">
                                <h2><a href="{{ route('showPost', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>

                                <div class="post-meta align-items-center text-left clearfix">
                                    <a href="{{ route('show_profile', ['slug_user' => $post->user->slug]) }}">
                                        <figure class="author-figure mb-0 me-3 float-start"><img
                                                src="{{ asset('imgs/' . $post->user->image) }}" alt="Image"
                                                class="img-fluid"></figure>
                                    </a>
                                    <span class="d-inline-block mt-1">By <a
                                            href="{{ route('show_profile', ['slug_user' => $post->user->slug]) }}">{{ $post->user->name }}</a></span>
                                    <span>&nbsp;-&nbsp; {{ $post->created_at }}</span>

                                    <i class="fas fa-heart">likes=</i>
                                    <span class="like-count">{{ $post->likes()->count()}}</span>
                                    @auth
                                    @if (auth()->user()->likes()->where('post_id', $post->id)->exists())
                                    <button class="like-button" wire:click="not_like({{$post->id}})" >

                                        إلغاء الإعجاب
                                    </button>
                                    @else
                                    <button wire:click='like({{ $post->id }})' class="like-button" >

                                        إعجاب
                                    </button>
                                    @endif
                                    @endauth



                                    <style>
                                        .like-button {
                                            background-color: #4285f4;
                                            /* لون فيسبوك */
                                            color: #fff;
                                            border: none;
                                            padding: 10px 20px;
                                            border-radius: 5px;
                                            cursor: pointer;
                                            transition: background-color 0.3s ease;
                                        }

                                        .like-button:hover {
                                            background-color: #3069d9;
                                            /* لون فيسبوك داكن */
                                        }

                                        .like-button .fas {
                                            margin-right: 5px;
                                        }

                                        .like-count {
                                            font-weight: bold;
                                        }

                                        .like-button.active {
                                            /* عند الضغط على الزر */
                                            background-color: #3069d9;
                                            /* لون فيسبوك داكن */
                                        }

                                        .like-button.active-blue {
                                            /* عند الضغط على الزر (أزرق) */
                                            background-color: #4285f4;
                                            /* لون فيسبوك */
                                        }
                                    </style>





                                </div>

                                <p>{{ $post->short_description }}</p>
                                <p><a href="{{ route('showPost', ['slug' => $post->slug]) }}" class="read-more">Continue
                                        Reading</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
</div>

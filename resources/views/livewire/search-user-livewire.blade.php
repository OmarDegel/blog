<div>
    <form action="#" class="sidebar-search-form">


        <input type="text" wire:model.lazy='search' class="form-control" id="s" placeholder="Search Users ...">
        {{-- <span class="bi-search"></span> --}}
        @if ($search)
            @if ($users->count())
                <ul class="list-group">
                    @foreach ($users as $user)
                        @if ($user->id == auth()->user()->id)
                        @else
                            <li class="list-group-item">
                                <div class="post-meta align-items-center text-left clearfix">
                                    <a href="{{ route('show_profile', ['slug_user' => $user->slug]) }}">
                                        <figure class="author-figure mb-0 me-3 float-start"><img
                                                src="{{ asset('imgs/' . $user->image) }}" alt="Image"
                                                class="img-fluid">
                                        </figure>
                                    </a>

                                    <span class="d-inline-block mt-1">By <a
                                            href="{{ route('show_profile', ['slug_user' => $user->slug]) }}">{{ $user->name }}</a></span>




                                    @if (App\Models\Friend::where('user_id', auth()->user()->id)->where('friend_id', $user->id)->exists() ||
                                            App\Models\Friend::where('friend_id', auth()->user()->id)->where('user_id', $user->id)->exists())
                                        @php
                                            $friend = App\Models\Friend::where('user_id',auth()->user()->id)->where('friend_id',$user->id)
                                                ->orWhere('user_id',$user->id)->orWhere('friend_id',auth()->user()->id)
                                                ->first();
                                        @endphp
                                        @if ($friend->status == 'waitting')
                                            <span class="d-inline-block mt-1">
                                                <span class="btn btn-primary">قيد الانتظار</span>
                                            </span>
                                        @endif
                                        @if ($friend->status == 'friends')
                                            <span class="d-inline-block mt-1">
                                                <span class="btn btn-primary"> انتم الان اصدقاء</span>
                                            </span>
                                        @endif
                                    @else
                                        <span class="d-inline-block mt-1">
                                            <button wire:click='create_friend({{ $user->id }})' type="button"
                                                class="btn btn-primary">اضافه صديق</button>
                                        </span>
                                    @endif


                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <h1>Not found</h1>
            @endif
        @endif
    </form>
</div>

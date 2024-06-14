<div>
    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="v-btn__content" data-no-activator=""><svg data-v-5e2e69e4="" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" tag="i"
                    class="v-icon notranslate v-theme--light iconify iconify--bx" width="1em" height="1em"
                    viewBox="0 0 24 24" style="font-size: 24px; height: 24px; width: 24px;">
                    <path fill="currentColor"
                        d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                    </path>
                </svg>
            </span>
            <span>{{ Auth::User()->unreadNotifications->count() }}</span>
        </button>
        <ul class="dropdown-menu">
            @foreach (Auth::User()->unreadNotifications as $notification)
                @if ($notification->type == 'App\Notifications\AddFriend')
                    @if ($notification->data['status'] == 'approve_friends')
                        <li class="list-group-item">
                            <div class="post-meta align-items-center text-left clearfix">
                                <a href="">
                                    <figure class="author-figure mb-0 me-3 float-start"><img
                                            src="{{ asset('imgs/' . $notification->data['user_image']) }}" alt="Image"
                                            class="img-fluid"></figure>
                                </a>
                                <span class="d-inline-block mt-1"> تم قبول طلب صداقتك بواسطه
                                    {{ $notification->data['user_name'] }}</span>
                            </div>
                            {{ $notification->markAsRead() }}
                        </li>
                    @endif
                    @if ($notification->data['status'] == 'cancel_friends')
                        <li class="list-group-item">
                            <div class="post-meta align-items-center text-left clearfix">
                                <a href="">
                                    <figure class="author-figure mb-0 me-3 float-start"><img
                                            src="{{ asset('imgs/' . $notification->data['user_image']) }}" alt="Image"
                                            class="img-fluid"></figure>
                                </a>
                                <span class="d-inline-block mt-1"> تم رفض طلب صداقتك بواسطه
                                    {{ $notification->data['user_name'] }}</span>
                            </div>
                            {{ $notification->markAsRead() }}
                        </li>
                    @endif
                    @if ($notification->data['status'] == 'friends')
                        <li class="list-group-item">
                            <div class="post-meta align-items-center text-left clearfix">
                                <a href="">
                                    <figure class="author-figure mb-0 me-3 float-start"><img
                                            src="{{ asset('imgs/' . $notification->data['user_image']) }}" alt="Image"
                                            class="img-fluid"></figure>
                                </a>
                                <span class="d-inline-block mt-1">By
                                        {{ $notification->data['user_name'] }}</span>
                                <span class="d-inline-block mt-1">
                                    {{ $notification->id }}
                                    <button
                                        wire:click='approve_friend({{$notification->data['user_id']}},{{$notification->notifiable_id  }})'
                                        type='button' class="btn btn-primary">
                                        Approve
                                    </button>
                                    <button
                                        wire:click='cancel_friend({{ $notification->data['user_id'] }},{{ $notification }})'
                                        type='button' class="btn btn-danger">
                                        Cancel
                                    </button>
                                </span>
                            </div>
                        </li>
                    @endif
                @endif

                @if ($notification->type == 'App\Notifications\CreatePost')
                    <li class="list-group-item">
                        <div class="post-meta align-items-center text-left clearfix">
                            <a href="">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('imgs/' . $notification->data['user_image']) }}" alt="Image"
                                        class="img-fluid"></figure>
                            </a>
                            <span class="d-inline-block mt-1">By <a
                                    href="{{ route('showPost', ['slug' => $notification->data['post_slug']]) }}">
                                    {{ $notification->data['user_name'] }}   انشر بوست تضغط هنا علشان تشوفوه</a>{{ $notification->markAsRead() }}</span>

                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>


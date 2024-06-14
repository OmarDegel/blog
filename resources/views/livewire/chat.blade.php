<div wire:poll>

    <div class="app">
        <div class="wrapper">
            <div class="chat-area">

                <div class="chat-area-main">
                    @forelse ($messages as $message)
                    @if ($message->user_id==auth()->user()->id)
                    <div class="chat-msg owner">
                        <div class="chat-msg-profile">

                            <div class="chat-msg-date">Message seen {{ $message->created_at->diffForHumans(null,false,false) }} </div>
                        </div>
                        <div class="chat-msg-content">
                            <div class="chat-msg-text">{{ $message->message }}</div>

                        </div>
                    </div>
                    @else
                    <div class="chat-msg">
                        <div class="chat-msg-profile">
                            <img class="chat-msg-img"
                                src="{{asset('imgs'.$message->user->image )}}"
                                alt="">
                            <div class="chat-msg-date">Message seen {{ $message->created_at->diffForHumans(null,false,false) }}</div>
                        </div>
                        <div class="chat-msg-content">
                            <div class="chat-msg-text">{{ $message->message }}</div>

                        </div>
                    </div>
                    @endif
                    @empty
                    <h1>Not Found Messages</h1>

                    @endforelse


                </div>
                <form wire:submit.prevent='send_message'>
                <div class="chat-area-footer">
                    <input type="text" wire:model.defer='message' placeholder="Type something here..." />
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>

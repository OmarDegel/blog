<div>
    @if(\Session::has('message'))
        <div class="alert alert-success">{{ \Session::get('message') }}</div>
        {{-- {{ \Session::forget('message') }} --}}
@endif
<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading text-white mb-3" data-aos="fade-up">Edit Profile {{ $user->name }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info">
                    <a href="" class="img-link"><img src="{{ asset('imgs/'.$user->image) }}" alt="Image"
                        class="img-fluid"></a>

                    {{-- <div class="address mt-2">
                        <i class="icon-room"></i>
                        <h4 class="mb-2">Location:</h4>
                        <p>43 Raymouth Rd. Baltemoer,<br> London 3910</p>
                    </div> --}}

                    {{-- <div class="open-hours mt-4">
                        <i class="icon-clock-o"></i>
                        <h4 class="mb-2">Open Hours:</h4>
                        <p>
                            Sunday-Friday:<br>
                            11:00 AM - 2300 PM
                        </p>
                    </div> --}}


                    <div class="email mt-4">
                        <i class="icon-envelope"></i>
                        <h4 class="mb-2">Email:</h4>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="phone mt-4">
                        <i class="icon-phone"></i>
                        <h4 class="mb-2">Call:</h4>
                        <p>+1 1234 55488 55</p>
                    </div>

                </div>
            </div>
            @if ($message)
                    <div class="alert alert-success"><button wire:click='close_message'
                            class="btn btn-danger">x</button>{{ $message }}</div>
                @endif
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <form wire:submit.prevent='save'>
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="">UserName:{{ $user->name }}</label>
                            <input type="text"  class="form-control" placeholder="Edit UserName"  wire:model='name' value="{{ $user->name }}" >
                            <br>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                        </div>
                        <div class="col-6 mb-3">

                            <input type="text" wire:model='email' class="form-control" placeholder="Edit Email" name="email" value="{{ $user->email }}">
                            <br>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                        </div>

                        
                        <div class="col-6 mb-3">
                            <input type="file"wire:model='image' class="form-control" placeholder="Image" name="image">
                            <br>
                                @error('image')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                        </div>
                        <div class="col-12 mb-3">
                            <textarea  wire:model='short_description' id="" cols="30" rows="7" class="form-control"
                            >{{ $user->short_description }}</textarea>
                            <br>
                                @error('short_description')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                        </div>

                        <div class="col-12">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- /.untree_co-section -->
</div>

@extends('frontend.layouts.app')
@section('content')
<!-- ============================ Create Account  form ============================= -->
@php 
use App\Models\User;

$characters = '0123456789';
        $charactersNumber = strlen($characters);
        $codeLength = 8;
        $user_id = 'U' . '';

        while (strlen($user_id) < 8) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $user_id = $user_id . $character;
        }

        if (User::where('user_id', $user_id)->exists()) {
            $this->generateUniqueCode();
        }

@endphp
<style>
    .color {
        color: white;
    }
</style>
<section class="login-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/login/images/form2.png')}}');
      ">
    <div class="container">
        <div class="login-contentt">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="bg-blur">
                @csrf
                  
                <input type="hidden" name="user_id" value="{{$user_id}}" >
                <h3>Create Your Account</h3>
                <div class="main-input">
                    <label class="color" for="name" class="col-form-label text-md-end">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('name')
                    <span class="invalid-feedback" role="alert">  
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="main-input">
                    <label class="color" for="email" class=" col-form-label text-md-end">{{ __('Email Address')
                        }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="main-input">
                    <label class="color" for="email" class=" col-form-label text-md-end">{{ __('Number') }}</label>
                    <input id="number" type="text" class="form-control @error('number') is-invalid @enderror"
                        name="number" value="{{ old('number') }}" required autocomplete="number">
                    @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="main-input">
                    <label class="color" for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" placeholder="6 Digit" type="password" :type="show ? 'password' : 'text'" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="main-input">
                    <label class="color" placeholder="" for="password-confirm" class=" col-form-label text-md-end">{{ __('Confirm
                        Password')
                        }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="notificationButton">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
        </div>
        </form>
        @if (Session::has('message'))
        <script>
            swal("message", "{{Session::get('message')}}", 'success', {
                button: true,
                button: 'ok',
                timer: 10000,
                timerProgressBar: true,
                animation: true,
                icon: "success"
            });
        </script>
        @endif
    </div>
    </div>
</section>

<!-- ============================ Create Account  form end  ============================= -->

@endsection
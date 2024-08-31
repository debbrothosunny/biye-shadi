<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biya Shady</title>
    <link rel="stylesheet" href="{{asset('assets/css/AdminLoginStyle.css')}}">
        <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body>
    
    <div class="form">
        <div class="form-container">
            <div class="form-header">
                <h2>Biya Shady</h2>
                <p>Welcome To Admin Login</p>
            </div>
           
            <form method="POST" action="{{ route('Admin.Login') }}">
            @if(Session::has('error_msg'))
                <div class="alert-success p-3 mb-3" style="color: #7272e6; margin-bottom:15px; text-align:center;">{{Session::get('error_msg')}}</div>
            @endif
            @csrf
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"  autocomplete="email" autofocus style="margin-bottom: 10px;">
                    <span class="invalid-feedback" role="alert">
                        <p style="color: red;"> @error('email'){{ $message }} @enderror</p>
                    </span>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  autocomplete="current-password" style="margin-bottom: 10px;">
                    <span class="invalid-feedback" role="alert">
                        <p style="color: red;"> @error('password'){{ $message }} @enderror</p>
                    </span>
                </div>
    
                <div class="submit-s">
                    <button type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
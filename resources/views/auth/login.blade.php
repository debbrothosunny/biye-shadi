<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="{{asset('assets/css/AdminLoginStyle.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="form">
        <div class="form-container">
            <div class="form-header">
                <h2>Biya Shady</h2>
                <p>Welcome To User Login</p>
            </div>
            <form method="POST" action="">
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red; text-align:center;"> @error('email'){{ $message }} @enderror</strong>
                </span>
                @csrf
                <div class="email" style="margin-top: 15px;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus style="margin-bottom: 10px;">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                        style="margin-bottom: 10px;">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="checkbox-b">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
                <div class="change-password">
                    Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                </div>
                <div class="submit-s mt-2" >
                    <button type="submit">LOGIN</button>
                    
                    <a class="btn btn-link" href="{{route('password.request')}}">
                        {{ __('Forgot Password?') }}
                    </a>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
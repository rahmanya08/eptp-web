<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>
<body>
   
    <div class="container">
        <div class="tab show">
            <img src="#" alt="">
                <h1>Welcome Back</h1>
                <p>Login with your email address</p>
                @csrf
                <div class="form">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="signup">
                <button type="button">Login</button>
                </div>
                <p>Do you haven't a account ? <a href="{{ route('signup') }}">SignUp</a></p>
        </div>
    </div>


    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
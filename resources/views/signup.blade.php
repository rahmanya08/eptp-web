<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>SignUp</title>
</head>
<body>
   
    <div class="container">
        <div class="tab show">
            <img src="#" alt="">
                <h1>Create Account</h1>
                <p>Use your email address for register account</p>
                @csrf
                <div class="form">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="form">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="signup">
                <button type="button">Sign Up</button>
                </div>
                <p>Already have a account ? <a href="{{ route('login') }}">Login </a></p>
        </div>
    </div>


    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
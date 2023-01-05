<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Card</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="tab show">
            <img src="#" alt="">
                <h2>Test Card</h1>
                <h2>English Profiency Test - PNC</h2>
                <h2>EPT-P</h2>
                @csrf
                <div class="form">
                    <label for="reg-num" class="form-label">Registration Number</label>
                    <input type="text" name="reg-num" placeholder="Reistration Number">
                </div>
                <div class="form">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" placeholder="name">
                </div>
                <div class="form">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="download">
                <button type="button">Download</button>
                </div>
        </div>
    </div>


    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
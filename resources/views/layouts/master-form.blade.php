<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @stack('meta')
    <title>@yield('title')</title>
    @stack('custom-css')
</head>
    <body>
        <div class="container">
            @yield('container')
        </div>

        @stack('child-js')   
    </body>
</html>
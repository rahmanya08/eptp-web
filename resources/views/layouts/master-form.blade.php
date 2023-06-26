<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js" ></script>
    @stack('meta')
    <title>@yield('title')</title>
    @stack('custom-css')
</head>
    <body>

        <!--NAVBAR-->
        @include('partials.navbar-form')
        <!--NAVBAR-->
        <!--CONTENT-->
        <div class="warpper">
            @yield('main-content')
        </div>
        <!--CONTENT-->


        @stack('child-js')   
    </body>
</html>
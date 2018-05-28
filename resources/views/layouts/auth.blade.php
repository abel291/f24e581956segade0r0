<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ config('app.name', '') }} | Login</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    

</head>

<body class="gray-bg">

    @yield('content')

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>

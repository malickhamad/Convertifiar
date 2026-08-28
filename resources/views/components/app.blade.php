
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <meta name="robots" content="@yield('robots', 'index, follow')">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @include('components.style-links')

</head>

<body>

    @include('components.captcha')
    
    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    @include('components.script-links')

    @yield('scripts')
</body>

</html>

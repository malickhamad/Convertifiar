@extends('app')

@section('meta')

    <title>404 - Page Not Found</title>

    <meta name="description" content="The page you are looking for could not be found.">

@endsection

@section('content')

<div class="container text-center py-5">

    <h1 class="display-1 fw-bold">404</h1>

    <h2 class="mb-3">Page Not Found</h2>

    <p class="text-muted mb-4">
        Sorry, the page you are looking for doesn't exist.
    </p>

    <a href="{{ route('home') }}" class="btn btn-primary">
        Go to Homepage
    </a>

</div>

@endsection
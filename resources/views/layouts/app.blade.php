<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @include('includes.head')
</head>
<body>
    <div id="app">
        @include('includes.messages')
        <nav class="navbar sticky-top navbar-light bg-faded">
        @include('includes.navbar')
        @if(Request::is('/') || Request::is('sorted'))
        @include('includes.issueSection')
        @endif
      </nav>
        <div id="main">
          @yield('content')
        </div>
        @include('includes.scripts')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>

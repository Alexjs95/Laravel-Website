<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- uses existing css file containing bootstap-->
        <title>{{config('app.name', 'ASForum')}}</title>
    </head>
    <body>
        @include('include.navbar')
        <div class="container">
            @include('include.messages')
            @yield('content')           <!--laravel blade snippets exention -->
        </div>

        <!-- Scripts -->
        <script src="{{ URL::asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

    </body>
</html>

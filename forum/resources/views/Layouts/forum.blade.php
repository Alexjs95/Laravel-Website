<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- uses existing css file containing bootstap-->
        <title>{{config('app.name', 'ASForum')}}</title>
    </head>
    <body>
        @include('include.navbar')
        <div class="container">
            
            @yield('content')           <!--laravel blade snippets exention -->
        </div>

    </body>
</html>

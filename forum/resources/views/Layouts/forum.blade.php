<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- uses existing css file containing bootstap-->
        <title>{{config('app.name', 'Games Forum')}}</title>
    </head>
    <body>
        @yield('content')           <!--laravel blade snippets exention -->
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ninjas</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
    <h1>Welcome to Ninja network</h1>
    <p>Click to view more ninjas.</p>
    <a href="{{url('/ninjas')}}" class="btn">Find Ninjas!</a>
    <p>Today's message is: {{$message}}</p>
    </body>
</html>

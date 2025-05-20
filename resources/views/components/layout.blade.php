<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ninja Network</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="{{url('/ninjas')}}">All Ninjas</a>
            <a href="{{url('/ninjas/create')}}">Create a Ninja</a>
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>

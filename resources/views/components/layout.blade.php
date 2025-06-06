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
    @if(session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <header>
        <nav>
            <h1>Ninja Network</h1>
            @guest
                <a href="{{ route('show.login') }}" class="btn">Login</a>
                <a href="{{ route('show.register') }}" class="btn">Register</a>
            @endguest

            @auth
                <span class="border-r-2 pr-2">
                    Hi there, {{ Auth::user()->name }}
                </span>
                <a href="{{ route('ninjas.index') }}">All Ninjas</a>
                <a href="{{ route('ninjas.create') }}">Create a Ninja</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
            @endauth
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>

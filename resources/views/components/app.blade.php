<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.create') }}">Crea Libro</a>
                    </li>


                </ul>
            </div>
        </div>
        <div>
            @auth
                <div class="container-fluid">
                    Ciao, {{ Auth::user()->name }}
                </div>
                <a href="/profilo">I Miei Libri</a>
            @endauth

            @guest
                <div class="container-fluid">
                    <a href="/register">Registrati</a>
                    <a href="/login">Accedi</a>
                </div>
            @endguest

        </div>
    </nav>
    <main class="container mt-5">
        @auth
            <p>La tua email è: {{ Auth::user()->email }}</p>
            <hr>
            <form action="/logout" method="POST" class="container my-5">
                @csrf
                <button type="submit" class="btn btn-danger">Esci dall'account</button>
            </form>
        @endauth
        {{ $slot }}
    </main>


</body>

</html>

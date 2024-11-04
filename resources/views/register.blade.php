<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turids Neglsalong</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="/"> <img class="navbar-logo" src="/turidsNeglsalong.png" alt="Navbar logo"></a>
        </nav>
    </header>
    <h1>Registrer deg </h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Navn:</label>
        <input type="text" name="name" required>
        <label for="email">E-post:</label>
        <input type="email" name="email" required>
        <label for="password">Passord:</label>
        <input type="password" name="password" required>
        <label for="password_confirmation">Bekreft Passord:</label>
        <input type="password" name="password_confirmation" required>
        <input type="submit" value="Registrer deg">
        <p>Har du bruker? <a href="/login">Logg inn her</a></p>
    </form>

</body>

</html>
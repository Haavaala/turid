<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turids Neglsalong</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>

<body>
    <header>
        <nav>
            <a href="/"> <img class="navbar-logo" src="/turidsNeglsalong.png" alt="Navbar logo"></a>
            <!-- <a href="/login"> <button onclick="" class="login-button"><img src="/login.png" alt="login"> Logg inn</button></a> -->
        </nav>
    </header>
    <h1>Logg inn </h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">E-post:</label>
        <input type="email" name="email" required>
        <label for="password">Passord:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Logg inn">
        <p>Har du ikke bruker? <a href="/register">Registrer deg her</a></p>
    </form>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif




</body>

</html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='{{ url('css/login.css') }}'>
    <script src='{{ url('js/login.js') }}' defer></script>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
</head>


<body>
    <header>
        @if (isset($old_username))
            <div class='errore'>Credenziali non valide</div>
        @endif
        <form method='post'>
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
            <label>&nbsp Username <input type='text' id='username' name='username' value='{{ $old_username }}'></label>
            <label>&nbsp Password <input type='password' id='password' name='password'></label>
            <label>&nbsp; <input type='submit' value='Accedi'></label>
        </form>
       
     <a href='{{ url('register') }}'>Non sei registrato?</a>
      

    </header>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

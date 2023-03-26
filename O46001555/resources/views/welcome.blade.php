<html>

<head>
    <meta charset="utf-8">
    <title>Welcome - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='{{ url('css/welcome.css') }}'>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
</head>

<body>
    <header>

        <h2>Benvenuto in</h2>
        <h1>Esplorando Posti Belli</h1>

        <div>
            <div id="buttons">
                <a class="button" href='{{ url('login') }}'>Accedi</a>
                <a class="button" href='{{ url('register') }}'>Registrati</a>
            </div>
        </div>



    </header>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

<html>

<head>
    <meta charset="utf-8">
    <title>Register - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='{{ url('css/register.css') }}'>
    <script src='{{ url('js/register.js') }}' defer></script>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
</head>


<body>
    <header>
        <span id= "validation">Per Username e Password sono ammessi solo lettere, numeri e underscore. Massimo 15 caratteri per Username, minimo 5 per Password </span>
        <div id="error_general" class="hidden">ERRORE: Controlla tutti i campi e riprova</div>
        <span id="error_user" class="hidden">ERRORE: Utente già esistente</span>
        <span id="error_confirm" class="hidden">Le password non corrispondono</span>
        
        <form method="POST">
            @csrf
            <label>&nbsp Username <input type='text' id='username' name='username' verifyUsername = "{{ route('register.checkUsername') }}"></label>
            <label>&nbsp Password <input type='password' id='password' name='password'></label>
            <label>&nbsp Conferma Password <input type='password' id='conf_password' name='password'></label>
            <label>&nbsp; <input type='submit' value='Registrati'></label>
        </form>
       
     <a href='{{ url('login') }}'>Hai già un account?</a>
      

    </header>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

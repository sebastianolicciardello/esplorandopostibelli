<html>

<head>
    <meta charset="utf-8">
    <title>Luoghi - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet"> 
    <link rel='stylesheet' href='{{ url('css/luoghi.css') }}'>
    <script src='{{ url('js/luoghi.js') }}' defer></script>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
</head>

<body>
        <nav>
            <div id="mainnav">
                <div id="navmobile">
                    <div id="logo">
                            ESPLORANDO POSTI BELLI
                    </div>
                        <img src="https://i.postimg.cc/0Qmvp8Xf/iconfinder-5957006-add-create-new-plus-icon-256px.png" 
                            width="40" height="40" id="menu">
                </div>
                <div class="links-mobile">
                    <a href='{{ url('home') }}'>LUOGHI</a>
                    <a href='{{ url('equip') }}'>EQUIPAGGIAMENTO</a>
                    <a href='{{ url('chat') }}'>CHAT</a> 
                    <a class="mini_button" href='{{ url('logout') }}'>LOGOUT</a>
                </div>
            </div>
            <div id="links">
                <a href='{{ url('home') }}'>LUOGHI</a>
                <a href='{{ url('equip') }}'>EQUIPAGGIAMENTO</a>
                <a href='{{ url('chat') }}'>CHAT</a> 
                <a class="mini_button" href='{{ url('logout') }}'>LOGOUT</a>
            </div>
        </nav>

            <div id="spazio"></div>
            <div id="spaziomobile"></div>

        <div id="favoritesUser">
            <h2 id="h2container">Preferiti di {{ $username }}</h2>
            <div id="favorites_container">
            </div>
        </div>

        <div id="places">
            <h2 id="h2container">Luoghi non aggiunti</h2>
            <div id="places_container">
            </div>
        </div>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

<html>

<head>
    <meta charset="utf-8">
    <title>Chat - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet"> 
    <link rel='stylesheet' href='{{ url('css/chat.css') }}'>
    <script src='{{ url('js/chat.js') }}' defer></script>
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
    
    <div id="newMessage">
        <p>Qui puoi scrivere qualsiasi cosa, 
            puoi anche segnalare un luogo da aggiungere!
        </p>
        <div> 
            <h3>Scrivi un messaggio</h3>
            <form method='post' action="{{ route('chat.add') }}" enctype="multipart/form-data">
                @csrf
                <textarea name="messaggio" id="messaggio" cols="70" rows="9" maxlength="280"></textarea>
                <input type='submit' id='submit' value='Invia'> 
            </form>
        </div>
        <div id="chat">
            <h2>Chat globale</h2>
            <div id="messages">
            </div>
        </div>
    </div>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

<html>

<head>
    <meta charset="utf-8">
    <title>Admin - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='{{ url('css/admin.css') }}'>
    <script src='{{ url('js/admin.js') }}' defer></script>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
</head>

<body>
    <header>
        <nav>
            <div id="logo">
                ESPLORANDO POSTI BELLI
            </div>
            <a class="mini_button" href='{{ url('logout') }}'>LOGOUT</a>
        </nav>
    </header>

    <div class="centered">
        <h2>Gestione contenuti</h2>
        <button class="mini_button_add">Aggiungi luogo</button>
    </div>
    <div id="amm">
        <section id="view-add" class="hidden">
            <p>Carica le immagini tramite URL, puoi usare <a href="https://postimages.org/"
                    target="_blank">PostImages</a>
                per caricare le tue foto, utilizza il link diretto per non avere problemi.</p>
            <p>Per il percorso usa <a href="http://share.mapbbcode.org/" target="_blank">MapBBCode</a>. 
                Non dimenticare di inserire "http://"</p>
            <p>Le 5 immagini per la galleria
                non sono obbligatorie, gli altri dati si.</p>
            
            <form method='post' action="{{ route('home.addPlace') }}" class=form_class>
                @csrf
                <div>

                    <label>&nbsp Nome Luogo <input type='text' id='placeName' class="notnull" name='nome'></label>
                    <label>&nbsp Immagine principale <input type='text' id='primaryImg' class="notnull"
                            name='primaryImg'></label>
                    <label>&nbsp Immagine del percorso <input type='text' id='routeImg' class="notnull"
                            name='routeImg'></label>
                    <label>&nbsp Link al percorso <input type='text' id='routeUrl' class="notnull"
                            name='routeUrl'></label>
                    <label>&nbsp Località <input type='text' id='locality' class="notnull" name='locality'></label>
                    <label>&nbsp Difficoltà (0-10) <input type='text' id='difficulty' class="notnull"
                            name='difficulty'></label>
                </div>
                <div>
                    <label>&nbsp Immagine N.1 <input type='text' id='one_img' name='one_img'></label>
                    <label>&nbsp Immagine N.2 <input type='text' id='two_img' name='two_img'></label>
                    <label>&nbsp Immagine N.3 <input type='text' id='three_img' name='three_img'></label>
                    <label>&nbsp Immagine N.4 <input type='text' id='four_img' name='four_img'></label>
                    <label>&nbsp Immagine N.5 <input type='text' id='five_img' name='five_img'></label>
                    <h3 class="error_form"></h3>
                    <div class="buttons_add">
                        <label>&nbsp; <input type='submit' value='Conferma'></label>
                        <button class="mini_button">Annulla</button>
                    </div>
                </div>

            </form>
            

        </section>

        <h2 class="title">Elenco luoghi</h2>
        <table id="list">
            <tr>
                <th>Luoghi</th>
                <th>Preferiti</th>
                <th>Valutazione</th>
                <th></th>
             <tr>

               
        </table>


        <h2 class="title">Gestione Chat</h2>

     <div id="newMessage">
            <div> 
                <h4>Scrivi un messaggio</h4>
                <form id="formmessage" method='post' action="{{ route('chat.add') }}" enctype="multipart/form-data">
                    @csrf
                    <textarea name="messaggio" id="messaggio" cols="70" rows="9" maxlength="280"></textarea>
                    <input type='submit' id='submitmessage' value='Invia'> 
                </form>
            </div>
            <div id="chat">
                <h3>Chat globale</h3>
                <div id="messages">
                </div>
            </div>
        </div>
        
    </div>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

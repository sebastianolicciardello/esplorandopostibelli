<html>

<head>
    <meta charset="utf-8">
    <title>Equipaggiamento - Esplorando Posti Belli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet"> 
    <link rel='stylesheet' href='{{ url('css/equip.css') }}'>
    <script src='{{ url('js/equip.js') }}' defer></script>
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

    <div id="container">
        <div id="categories">
            <form>
                <div id="radios">
                    <div>
                        <input type="radio" id="1" name="amazon" value="tent"> 
                        <label for="1">Tende</label>    
                    </div>
                    <div>
                        <input type="radio" id="3" name="amazon" value="mirrorless camera">
                        <label for="3">Mirrorless</label>
                    </div>
                    <div>
                        <input type="radio" id="5" name="amazon" value="survival knife">
                        <label for="5">Coltellini</label>
                    </div>
                    <div>
                        <input type="radio" id="7" name="amazon" value="windbreaker">
                        <label for="7">K-Way</label>
                    </div>
                    <div>
                        <input type="radio" id="8" name="amazon" value="hike bag">
                        <label for="8">Zaini</label>
                    </div>
                    <div>
                        <input type="radio" id="10" name="amazon" value="flashlight">
                        <label for="10">Torce</label>
                    </div>
                    <div>
                        <input type="radio" id="12" name="amazon" value="trekking poles">
                        <label for="12">Bastoni</label>
                    </div>
                    <div>
                        <input type="radio" id="13" name="amazon" value="powerbank">
                        <label for="13">Powerbank</label>
                    </div>
                    <div>
                        <input type="radio" id="14" name="amazon" value="hike shoes">
                        <label for="14">Scarponcini</label>
                    </div>
                    <div>
                        <input type="radio" id="15" name="amazon" value="sleeping bag">
                        <label for="15">Sacchi a pelo</label>
                    </div>
                    <div>
                        <input type="radio" id="18" name="amazon" value="first aid kit">
                        <label for="19">Kit Medici</label>
                    </div>
                </div>
                <div class="center">
                    <input type='submit' id='submit' value='Cerca'>
                </div>
                
                </form>
        </div>
        <div id="results" class="resultsMargin">   
            <div id="resultsUnsplash">   
            </div>
            <div id="divider" class="hidden"></div>
            <div id="resultsPexels">   
            </div>
        </div> 
    </div>

    <footer>
        <address>SEBASTIANO LICCIARDELLO</address>
        <p>046001555</p>
    </footer>

</body>

</html>

//mostra menu mobile
function mostra_menu(event) {
    const image = event.currentTarget;
    const links = document.querySelector('.links-mobile');
    const spazio = document.querySelector('#spaziomobile');
    //se ho la +
    if (image.src.match('https://i.postimg.cc/0Qmvp8Xf/iconfinder-5957006-add-create-new-plus-icon-256px.png')) {
        image.src = 'https://i.postimg.cc/3wN21wG2/iconfinder-5957026-cancel-close-delete-remove-trash-icon-256px.png';
        links.classList.add('show-mobile');
        spazio.classList.add('margin');
    } //se ho x
    else {
        image.src = 'https://i.postimg.cc/0Qmvp8Xf/iconfinder-5957006-add-create-new-plus-icon-256px.png';
        links.classList.remove('show-mobile');
        spazio.classList.remove('margin');
    }
}

const button = document.querySelector('#menu');
button.addEventListener('click', mostra_menu);

function onJSONUpdatePlaces(json) {
    const containerPlaces = document.getElementById('places_container');
    const containerFavorites = document.getElementById('favorites_container');
    containerPlaces.innerHTML = '';
    containerFavorites.innerHTML = '';
    for (place of json) {
        const placecontainer = document.createElement("div");
        placecontainer.classList.add("placeContainer");
        // Sotto ho il contenuto del placecontainer
        const mini_place = document.createElement("div");
        mini_place.classList.add("mini_place");
        //Contenuto del mini_place
        const nome = document.createElement("span");
        nome.textContent = place.nome;
        nome.classList.add("nome");
        const mini_description = document.createElement("div");
        mini_description.classList.add("mini_description");
        const space = document.createElement("span");
        const locality = document.createElement("span");
        locality.textContent = "🌍: " + place.locality;
        const difficulty = document.createElement("span");
        const rating = document.createElement("span");
        if (place.rating == "?") {
            rating.textContent = "⭐: ?";
        } else {
            rating.textContent = "⭐: " + parseFloat(place.rating).toFixed(1);
        }
        rating.classList.add('padding');
        const mini_image = document.createElement('img');
        mini_image.classList.add("mini_image");
        mini_image.src = place.primaryImg;
        //bottone per aggiungere ai preferiti
        const favoriteButton = document.createElement("span");
        if (place.favorited == true) {
            favoriteButton.textContent = "❤️";
        } else {
            favoriteButton.textContent = "🖤";
        }
        favoriteButton.classList.add("favoriteButton");
        //staccato da mini_place ho i dettagli caricati dinamicamente
        const details = document.createElement("div");
        details.classList.add("details");
        details.classList.add("hidden");



        mini_place.appendChild(nome);
        mini_place.appendChild(favoriteButton);
        mini_description.appendChild(locality);
        mini_description.appendChild(rating);
        mini_place.appendChild(mini_description);
        mini_place.appendChild(mini_image);

        placecontainer.appendChild(mini_place);
        placecontainer.appendChild(details);

        if (place.favorited == true) {
            containerFavorites.appendChild(placecontainer);
        } else {
            containerPlaces.appendChild(placecontainer);
        }

    }

}

function responseAggiornaPlaces(response) {
    return response.json();
}

//Aggiorna luoghi
function aggiornaLuoghi() {
    // Richiedi luoghi
    fetch('home/placelist').then(responseAggiornaPlaces).then(onJSONUpdatePlaces);
}

// Carica inizialmente i luoghi
aggiornaLuoghi();

function onJSONUpdateRatings(json) {
    const currentPlace = document.querySelector('.bigContainer')
    const currentValutazione = currentPlace.childNodes[1].childNodes[2].childNodes[1];
    const stars = currentPlace.childNodes[1].childNodes[3].childNodes[0];
    const currentPlaceName = currentPlace.childNodes[1].childNodes[1].textContent;
    const miniPlaceRating = currentPlace.childNodes[0].childNodes[2].childNodes[1];
    if (json.rating == "?") {
        currentValutazione.textContent = "⭐ Valutazione: ?";
        miniPlaceRating.textContent = "⭐: ?";
    } else {
        currentValutazione.textContent = "⭐ Valutazione: " + parseFloat(json.rating).toFixed(1);
        miniPlaceRating.textContent = "⭐: " + parseFloat(json.rating).toFixed(1);
    }
    if (json.userRate != 0) {
        const currentRate = json.userRate;
        for (let i = 0; i < currentRate; ++i) {
            stars.childNodes[i].textContent = "⭐ ";
        }
        for (let d = currentRate; d < 5; ++d) {
            stars.childNodes[d].textContent = "★ ";
        }
    } else {
        for (let f = 0; f < 5; ++f) {
            stars.childNodes[f].textContent = "★ ";
        }
    }


}

function responseAggiornaVoti(response) {
    return response.json();
}

//Aggiorna la valutazione del luogo votato
function aggiornaVoti() {
    const placeName = document.querySelector('.bigContainer').childNodes[0].childNodes[0].textContent;
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const formData = new FormData();
    formData.append('nome', placeName);
    formData.append('_token', token);
    // Richiedi voto dell'utente e voti del luogo
    fetch('home/ratings', { method: 'POST', body: formData }).then(responseAggiornaVoti).then(onJSONUpdateRatings);
}

function responseVote() {
    aggiornaVoti();
}

//aggiunge il voto al database
function vote(event) {

    // Leggo il rating
    const currentStar = event.currentTarget;
    const formRate = currentStar.parentNode;
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const formData = new FormData();
    formData.append('rate', currentStar.value);
    const nomePlace = formRate.parentNode.parentNode.childNodes[1].textContent;
    formData.append('nomePlace', nomePlace);
    formData.append('_token', token);

    fetch('home/addVote', { method: 'POST', body: formData }).then(responseVote);



}

function nascondi_dettagli(event) {

    const closeButton = event.currentTarget;
    const toHide = closeButton.parentNode;
    toHide.classList.add('hidden');
    //libero le risorse
    toHide.innerHTML = "";
    const currentBigContainer = toHide.parentNode;
    currentBigContainer.classList.remove('bigContainer');
    const toShow = currentBigContainer.childNodes[0];
    toShow.classList.remove('hidden');

    //scrollInto scrolla la viewport in mini_place
    toShow.scrollIntoView();
    window.scrollBy(0, -100);
}

function onJSONLoadDetails(json) {
    //contenuto dettagli
    const mini_button_close = document.createElement("button");
    mini_button_close.textContent = "Chiudi dettagli";
    mini_button_close.classList.add("mini_button_close");
    const nomeBig = document.createElement("h2");
    nomeBig.textContent = json.nome;
    const big_description = document.createElement("div");
    big_description.classList.add("big_description");
    const localityBig = document.createElement("span");
    localityBig.textContent = "🌍 Località:  " + json.locality;
    const difficultyBig = document.createElement("span");
    difficultyBig.textContent = "🧭 Difficoltà:  " + json.difficulty + " / 10";
    difficultyBig.classList.add('paddingBig');
    const ratingBig = document.createElement("span");
    if (json.rating == "?") {
        ratingBig.textContent = "⭐ Valutazione:  ?";
    } else {
        ratingBig.textContent = "⭐ Valutazione:  " + parseFloat(json.rating).toFixed(1);
    }

    ratingBig.classList.add('paddingBig');
    //form per votare il luogo
    const voteContainer = document.createElement("div");
    voteContainer.classList.add('voteContainer');
    const voteButtons = document.createElement("form");
    voteButtons.classList.add('voteButtons');
    const vote1 = document.createElement("div");
    vote1.value = 1;
    vote1.classList.add('vote1');
    const vote2 = document.createElement("div");
    vote2.value = 2;
    vote2.classList.add('vote2');
    const vote3 = document.createElement("div");
    vote3.value = 3;
    vote3.classList.add('vote3');
    const vote4 = document.createElement("div");
    vote4.value = 4;
    vote4.classList.add('vote4');
    const vote5 = document.createElement("div");
    vote5.value = 5;
    vote5.classList.add('vote5');

    //Immagine principale e percorso
    const image_route = document.createElement("div");
    image_route.classList.add("image_route");
    const big_image = document.createElement("img");
    big_image.classList.add("big_image");
    big_image.src = json.primaryImg;
    const routeContainer = document.createElement("div");
    const routeUrl = document.createElement("a");
    routeUrl.href = json.routeUrl;
    routeUrl.target = "_blank";
    const routeImg = document.createElement("img");
    routeImg.src = json.routeImg;
    routeImg.classList.add("mini_image_details");
    const anteprima = document.createElement("h4");
    anteprima.textContent = "Anteprima percorso";
    const gallery = document.createElement("div");
    gallery.classList.add("gallery");
    for (image of json.images) {
        const gallery_image = document.createElement("img");
        gallery_image.classList.add("mini_image_details");
        gallery_image.src = image.url;
        gallery.appendChild(gallery_image);
    }

    const details = document.querySelector('.bigContainer').childNodes[1];
    details.appendChild(mini_button_close);
    details.appendChild(nomeBig);
    big_description.appendChild(localityBig);
    big_description.appendChild(ratingBig);
    big_description.appendChild(difficultyBig);
    details.appendChild(big_description);
    voteButtons.appendChild(vote1);
    voteButtons.appendChild(vote2);
    voteButtons.appendChild(vote3);
    voteButtons.appendChild(vote4);
    voteButtons.appendChild(vote5);
    voteContainer.appendChild(voteButtons);
    details.appendChild(voteContainer);
    image_route.appendChild(big_image);
    routeUrl.appendChild(routeImg);
    routeContainer.appendChild(routeUrl);
    routeContainer.appendChild(anteprima);
    image_route.appendChild(routeContainer);
    details.appendChild(image_route);
    details.appendChild(gallery);

    //cambio stelle colorate in base all'utente
    const star = document.querySelector('.voteButtons')
    const currentRate = json.userRate;
    if (currentRate != 0) {
        for (let i = 0; i < currentRate; ++i) {
            star.childNodes[i].textContent = "⭐ ";
        }
        for (let d = currentRate; d < 5; ++d) {
            star.childNodes[d].textContent = "★ ";
        }
    } else {
        for (let f = 0; f < 5; ++f) {
            star.childNodes[f].textContent = "★ ";
        }
    }





    //mostro dettagli
    details.classList.remove('hidden');
    const miniPlace = details.parentNode.childNodes[0];
    miniPlace.classList.add('hidden');

    //eventlistener a chiudi dettagli
    const closeButton = document.querySelector('.mini_button_close');
    closeButton.addEventListener('click', nascondi_dettagli);

    //eventlistener alle stelle per votare
    const stars1 = document.querySelectorAll('div.vote1');
    for (star1 of stars1) {
        star1.addEventListener('click', vote);
    }
    const stars2 = document.querySelectorAll('div.vote2');
    for (star2 of stars2) {
        star2.addEventListener('click', vote);
    }
    const stars3 = document.querySelectorAll('div.vote3');
    for (star3 of stars3) {
        star3.addEventListener('click', vote);
    }
    const stars4 = document.querySelectorAll('div.vote4');
    for (star4 of stars4) {
        star4.addEventListener('click', vote);
    }
    const stars5 = document.querySelectorAll('div.vote5');
    for (star5 of stars5) {
        star5.addEventListener('click', vote);
    }

    //scrollInto scrolla la viewport in details
    details.scrollIntoView();
    window.scrollBy(0, -100);

}

function responseLoadDetails(response) {
    return response.json();
}

//carica dinamicamente i dettagli del luogo cliccato
function mostra_dettagli(event) {
    //chiudo prima gli altri bigContainers
    const bigContainers = document.querySelectorAll('.bigContainer')
    for (bigContainer of bigContainers) {
        const toHide = bigContainer.childNodes[1];
        toHide.classList.add('hidden');
        bigContainer.classList.remove('bigContainer');
        const toShow = bigContainer.childNodes[0];
        toShow.classList.remove('hidden');
        //libero le risorse
        toHide.innerHTML = "";
    }
    //eseguo la fetch per caricare i dati
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const formData = new FormData();
    formData.append('nomePlace', event.currentTarget.parentNode.childNodes[0].textContent);
    formData.append('_token', token);
    fetch('home/loadDetails', { method: 'POST', body: formData }).then(responseLoadDetails).then(onJSONLoadDetails);

    //ingrandisco il container
    const image = event.currentTarget;
    const currentContainer = image.parentNode.parentNode;
    currentContainer.classList.add('bigContainer');


}

//ritarda add event listener, affinchè vengano prima caricati i luoghi
const mostraDettagliCall = () => {
    const containers = document.querySelectorAll('.mini_image');
    for (container of containers) {
        container.addEventListener('click', mostra_dettagli);
    }

}
setInterval(mostraDettagliCall, 1000);

function responseSwitchFavorite() {
    //aggiorna luoghi e favoriti;
    aggiornaLuoghi();
}

//cliccando il cuore aggiunge o rimuove ai preferiti
function switchFavorite(event) {
    // Leggo il favorite
    const currentFavorite = event.currentTarget;
    const nome = currentFavorite.parentNode.childNodes[0].textContent;
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const formData = new FormData();
    formData.append('nomePlace', nome);
    formData.append('_token', token);
    fetch('home/switchFavorite', { method: 'POST', body: formData }).then(responseSwitchFavorite);
}

//ritarda add event listener, affinchè vengano prima caricati i luoghi
const switchFavoriteCall = () => {
    const favoriteButtons = document.querySelectorAll('.favoriteButton');
    for (favoriteButton of favoriteButtons) {
        favoriteButton.addEventListener('click', switchFavorite);
    }
}
setInterval(switchFavoriteCall, 1004);
//chiude la modale e cancella gli input
function annullaAdd(event) {
    add.classList.remove('hidden');
    viewAdd.classList.add('hidden');
    event.preventDefault();
    document.getElementById('placeName').value = '';
    document.getElementById('primaryImg').value = '';
    document.getElementById('routeImg').value = '';
    document.getElementById('routeUrl').value = '';
    document.getElementById('locality').value = '';
    document.getElementById('difficulty').value = '';
    document.getElementById('one_img').value = '';
    document.getElementById('two_img').value = '';
    document.getElementById('three_img').value = '';
    document.getElementById('four_img').value = '';
    document.getElementById('five_img').value = '';
    document.querySelector('.error_form').textContent = "";
}

//apre la modale
function addModal() {
    viewAdd.classList.remove('hidden');
    add.classList.add('hidden');
}

//addevent listener per aggiungi luogo
const annulla = document.querySelector('section button.mini_button');
annulla.addEventListener('click', annullaAdd);
const add = document.querySelector('button.mini_button_add ');
const viewAdd = document.querySelector('#view-add');
add.addEventListener('click', addModal);

//controlla gli input
function controlla_campo(event) {
    if (event.currentTarget.value.length == 0 || event.currentTarget.value < 0 ||
        event.currentTarget.value > 10) {
        event.currentTarget.classList.add('vuoto');
    } else {
        event.currentTarget.classList.remove('vuoto');
    }
}

const inputs = document.querySelectorAll('input[type="text"].notnull');
for (input of inputs) {
    input.addEventListener('blur', controlla_campo);
}


function onJSONList(json) {
    console.log(json);
    const list = document.getElementById('list');
    list.innerHTML = '';
    const titles = document.createElement("tr");
    const title1 = document.createElement("th");
    title1.textContent = "Luoghi";
    const title2 = document.createElement("th");
    title2.textContent = "Preferiti";
    const title3 = document.createElement("th");
    title3.textContent = "Valutazioni";
    const title4 = document.createElement("th");
    title4.textContent = " ";

    titles.appendChild(title1);
    titles.appendChild(title2);
    titles.appendChild(title3);
    titles.appendChild(title4);
    list.appendChild(titles);
    for (place of json) {
        const hover = document.createElement("tr");
        hover.classList.add("hover");
        const nome = document.createElement("td");
        nome.textContent = place.nome;
        const preferiti = document.createElement("td");
        preferiti.textContent = place.count;
        const valutazioni = document.createElement("td");
        if (place.rating == 0) {
            valutazioni.textContent = "?";
        } else {
            valutazioni.textContent = parseFloat(place.rating).toFixed(1);
        }
        const rimuovi = document.createElement("td");
        rimuovi.textContent = "Rimuovi";
        rimuovi.classList.add("deletePlace");


        hover.appendChild(nome);
        hover.appendChild(preferiti);
        hover.appendChild(valutazioni);
        hover.appendChild(rimuovi);
        list.appendChild(hover);
    }
}

function responseAggiornaLista(response) {
    return response.json();

}

//lista dei luoghi con valutazioni e preferiti e tasto rimuovi
function aggiornaLista() {
    // Richiedi lista
    fetch('home/adminlist').then(responseAggiornaLista).then(onJSONList);
}

// Carica inizialmente la lista di luoghi
aggiornaLista();

function onJSONAdd(json) {
    const result = document.querySelector('.error_form');
    if (json.checkPlace != null) {
        result.classList.remove('confirm');
        result.textContent = json.checkPlace;
    } else {
        result.classList.add('confirm');
        result.textContent = "Luogo inserito correttamente";
        // Aggiorna luoghi
        aggiornaLista();
    }
}

function responseAggiungiPlace(response) {
    return response.json();
}

function responseRimuoviPlace() {
    // Aggiorna luoghi
    aggiornaLista();
}

//aggiungi luogo dalla modale
function aggiungiLuogo(event) {
    event.preventDefault();
    // Leggiamo i campi
    const nome = form_place.nome.value;
    const primaryImg = form_place.primaryImg.value;
    const routeImg = form_place.routeImg.value;
    const routeUrl = form_place.routeUrl.value;
    const locality = form_place.locality.value;
    const difficulty = form_place.difficulty.value;
    const one_img = form_place.one_img.value;
    const two_img = form_place.two_img.value;
    const three_img = form_place.three_img.value;
    const four_img = form_place.four_img.value;
    const five_img = form_place.five_img.value;
    // Verifichiamo che non siano vuoti
    let campi_ok = true;
    if (nome.length == 0) {
        campi_ok = false;
    }
    if (primaryImg.length == 0) {
        campi_ok = false;
    }
    if (routeImg.length == 0) {
        campi_ok = false;
    }
    if (routeUrl.length == 0) {
        campi_ok = false;
    }
    if (locality.length == 0) {
        campi_ok = false;
    }
    if (difficulty.length == 0 || difficulty > 10 || difficulty < 0) {
        campi_ok = false;
    }
    // Controlliamo
    if (!campi_ok) {
        document.querySelector('.error_form').textContent = "ERRORE: Controlla e riprova";
    } else {
        document.querySelector('.error_form').textContent = "";
        var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

        const formData = new FormData();

        formData.append('nome', nome);
        formData.append('primaryImg', primaryImg);
        formData.append('routeImg', routeImg);
        formData.append('routeUrl', routeUrl);
        formData.append('locality', locality);
        formData.append('difficulty', difficulty);
        formData.append('one_img', one_img);
        formData.append('two_img', two_img);
        formData.append('three_img', three_img);
        formData.append('four_img', four_img);
        formData.append('five_img', five_img);
        formData.append('_token', token);
        fetch(form_place.getAttribute("action"), { method: 'POST', body: formData }).then(responseAggiungiPlace).then(onJSONAdd);
        event.preventDefault();
        document.getElementById('placeName').value = '';
        document.getElementById('primaryImg').value = '';
        document.getElementById('routeImg').value = '';
        document.getElementById('routeUrl').value = '';
        document.getElementById('locality').value = '';
        document.getElementById('difficulty').value = '';
        document.getElementById('one_img').value = '';
        document.getElementById('two_img').value = '';
        document.getElementById('three_img').value = '';
        document.getElementById('four_img').value = '';
        document.getElementById('five_img').value = '';
    }


}

const form_place = document.querySelector('.form_class');
form_place.addEventListener('submit', aggiungiLuogo);

//rimuovi luogo dalla lista
function rimuovi_luogo(event) {
    const removePlaceButton = event.currentTarget;
    const hover = removePlaceButton.parentNode;
    const nome = hover.childNodes[0];
    fetch('home/removePlace/' + nome.textContent).then(responseRimuoviPlace);

}

//ritarda addeventlistener affinchè sia prima carica la lista
const removePlaceCall = () => {
    const removePlaces = document.querySelectorAll(".deletePlace");
    for (removePlace of removePlaces) {
        removePlace.addEventListener("click", rimuovi_luogo);
    }

}
setInterval(removePlaceCall, 1000);

function onJSONMessage(json) {
    const chat = document.getElementById('messages');
    chat.innerHTML = '';
    for (messaggio of json) {
        const single = document.createElement("div");
        const username = document.createElement("div");
        username.classList.add("username");
        const text = document.createElement("div");
        const date = document.createElement("div");
        const remove = document.createElement("div");
        const hidden = document.createElement("span");
        date.classList.add("date");
        single.classList.add("single");
        text.classList.add("text");
        remove.classList.add("remove");
        hidden.classList.add("hidden");
        date.textContent = messaggio.created_at.toString();
        text.textContent = messaggio.text;
        username.textContent = messaggio.user + " :";
        remove.textContent = "Rimuovi";
        hidden.textContent = messaggio.id;

        single.appendChild(username);
        single.appendChild(text);
        single.appendChild(date);
        single.appendChild(remove);
        single.appendChild(hidden);


        chat.appendChild(single);


    }
}

function responseAggiornaMessage(response) {
    return response.json();
}

//aggiorna chat
function aggiornaMessaggi() {
    // Richiedi lista messaggi
    fetch('chat/update').then(responseAggiornaMessage).then(onJSONMessage);
}

function responseAggiungiRimuovi() {
    // Aggiorna messaggi
    aggiornaMessaggi();
}

//aggiunge messaggio nella chat
function aggiungiMessaggio(event) {

    const form = document.querySelector("#formmessage");

    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    const formData = new FormData();
    const messaggio = form.messaggio.value;
    formData.append('messaggio', messaggio);
    formData.append('_token', token);
    fetch(form.getAttribute("action"), { method: 'POST', body: formData }).then(responseAggiungiRimuovi);
    event.preventDefault();
    document.getElementById('messaggio').value = '';
}

// Carica inizialmente la lista di messaggi
aggiornaMessaggi();
document.querySelector("#formmessage").addEventListener("submit", aggiungiMessaggio);

//rimuove messaggio dal database
function rimuovi_messaggio(event) {
    const removeButton = event.currentTarget;
    const single = removeButton.parentNode;
    const hidden = single.childNodes[4];
    fetch('chat/remove/' + hidden.textContent).then(responseAggiungiRimuovi);

}

//ritarda addeventlistener affinchè sia prima carica la chat
const removeButtonCall = () => {
    const removes = document.querySelectorAll(".remove");
    for (remove of removes) {
        remove.addEventListener("click", rimuovi_messaggio);
    }

}
setInterval(removeButtonCall, 1000);
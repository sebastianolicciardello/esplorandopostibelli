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

//mostra menu mobile
const button = document.querySelector('#menu');
button.addEventListener('click', mostra_menu);

function onJSON(json) {
    const chat = document.getElementById('messages');
    chat.innerHTML = '';
    for (messaggio of json) {
        const single = document.createElement("div");
        const username = document.createElement("div");
        username.classList.add("username");
        const text = document.createElement("div");
        const date = document.createElement("div");
        date.classList.add("date");
        single.classList.add("single");
        text.classList.add("text");
        date.textContent = messaggio.created_at.toString();
        text.textContent = messaggio.text;
        username.textContent = messaggio.user + " :";

        single.appendChild(username);
        single.appendChild(text);
        single.appendChild(date);


        chat.appendChild(single);

    }
}

function responseAggiorna(response) {
    return response.json();
}

//aggiorna la chat
function aggiornaMessaggi() {
    // Richiedi lista messaggi
    fetch('chat/update').then(responseAggiorna).then(onJSON);
}

function responseAggiungi() {
    // Aggiorna messaggi
    aggiornaMessaggi();
}

//aggiunge messaggio al database
function aggiungiMessaggio(event) {

    const form = document.querySelector("form");

    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    const formData = new FormData();
    const messaggio = form.messaggio.value;
    formData.append('messaggio', messaggio);
    formData.append('_token', token);
    fetch(form.getAttribute("action"), { method: 'POST', body: formData }).then(responseAggiungi);
    event.preventDefault();
    document.getElementById('messaggio').value = '';
}

// Carica inizialmente la lista di messaggi
aggiornaMessaggi();
document.querySelector("form").addEventListener("submit", aggiungiMessaggio);
//controlla gli input
function controlla_campo(event) {
    if (event.currentTarget.value.length == 0) {
        event.currentTarget.classList.add('vuoto');
    } else {
        event.currentTarget.classList.remove('vuoto');
    }
}

const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
for (input of inputs) {
    input.addEventListener('blur', controlla_campo);
}

//per verificare che sono stati riempiti tutti i campi
function validazione(event) {

    if (username.value.length == 0 ||
        password.value.length == 0 ||
        conf_password.value.length == 0 ||
        flag1 == 1 || flag2 == 1) {
        error_general.classList.remove('hidden');
        // Blocca l'invio del form
        event.preventDefault();
    } else {
        error_general.classList.add('hidden');
    }
}


function onJson(json) {
    if (json === 1) {
        flag2 = 1;
        document.getElementById('error_user').textContent = "ERRORE: Username già esistente";
        error_user.classList.remove('hidden');
    } else {
        flag2 = 0;
        document.getElementById('error_user').textContent = "ERRORE: Controlla e riprova";
        error_user.classList.add('hidden');
    }
}

function onResponse(response) {
    return response.json();
}

//per verificare se esiste già l'username
function controllo_username(event) {
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const username = event.currentTarget.value;
    const formData = new FormData();
    formData.append('send', username);
    formData.append('_token', token);

    fetch(event.currentTarget.getAttribute("verifyUsername"), { method: 'POST', body: formData }).then(onResponse).then(onJson);
}

//verifica se i caratteri sono corretti
function controllo_usernameCaratteri(event) {
    const error_general = document.getElementById('error_general');
    let campi_ok = true;
    const check = /^[a-zA-Z0-9_]+$/
    if (username.value.length == 0 || username.value.length > 15) {
        campi_ok = false;
    }
    if (!(username.value.match(check))) {
        campi_ok = false;

    }
    if (!campi_ok) {
        // Impediamo il submit
        error_general.classList.remove('hidden');
        event.preventDefault();
    } else {
        error_general.classList.add('hidden');
    }

}

//verifica se i caratteri sono corretti
function controllo_password(event) {
    const error_general = document.getElementById('error_general');
    const error_confirm = document.getElementById('error_confirm');
    let campi_ok = true;
    const check = /^[a-zA-Z0-9_]+$/
    if (password.value.length == 0 || conf_password.value.length == 0 || password.value.length < 5) {
        campi_ok = false;
    }
    if (!(password.value.match(check))) {
        campi_ok = false;

    }
    if (password.value !== conf_password.value) {
        flag1 = 1;
        error_confirm.classList.remove('hidden');
        campi_ok = false;
    } else {
        flag1 = 0;
        error_confirm.classList.add('hidden');
    }

    if (!campi_ok) {
        // Impediamo il submit
        error_general.classList.remove('hidden');
        event.preventDefault();
    } else {
        error_general.classList.add('hidden');
    }

}

const form = document.querySelector('form');
form.addEventListener('submit', validazione);

const username = document.querySelector('#username');
username.addEventListener('blur', controllo_username);
username.addEventListener('blur', controllo_usernameCaratteri);

const password = document.querySelector('#password');
password.addEventListener('blur', controllo_password);

const conf_password = document.querySelector('#conf_password');
conf_password.addEventListener('blur', controllo_password);

let flag1 = 0;
let flag2 = 0;
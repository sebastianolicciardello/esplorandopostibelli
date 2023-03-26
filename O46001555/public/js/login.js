// Validazione
function validazione(event) {
    // Leggiamo i campi
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');
    // Verifichiamo che non siano vuoti
    let campi_ok = true;
    if (username.value.length == 0) {
        campi_ok = false;
    }
    if (password.value.length == 0) {
        campi_ok = false;
    }
    // Controlliamo
    if (!campi_ok) {
        // Impediamo il submit
        event.preventDefault();
    }
}

const form = document.querySelector('form');
form.addEventListener('submit', validazione);

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
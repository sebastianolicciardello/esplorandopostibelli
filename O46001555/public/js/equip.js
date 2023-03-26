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

function onJson(json) {
    console.log(json);

    //prima carico le foto di unsplash
    // Svuotiamo
    const resultsUnsplash = document.querySelector('#resultsUnsplash');
    resultsUnsplash.innerHTML = '';
    // Leggi il numero di risultati
    let num_resultsUnsplash = json.unsplash.total;
    // Mostriamone al massimo 10
    if (num_resultsUnsplash > 5)
        num_resultsUnsplash = 5;
    const risultatoJsonUnsplash = json.unsplash.results;
    // Processa ciascun risultato
    for (let i = 0; i < num_resultsUnsplash; i++) {
        // Leggi url
        const image_urlUnsplash = risultatoJsonUnsplash[i].urls.small;
        // Creiamo l'immagine
        const imgUnsplash = document.createElement('img');
        imgUnsplash.src = image_urlUnsplash;
        resultsUnsplash.appendChild(imgUnsplash);
    }

    //carico le foto di pexels
    // Svuotiamo
    const resultsPexels = document.querySelector('#resultsPexels');
    resultsPexels.innerHTML = '';
    // Leggi il numero di risultati
    let num_resultsPexels = json.pexels.total_results;
    // Mostriamone al massimo 10
    if (num_resultsPexels > 5)
        num_resultsPexels = 5;
    const risultatoJsonPexels = json.pexels.photos;
    // Processa ciascun risultato
    for (let i = 0; i < num_resultsPexels; i++) {
        // Leggi url
        const image_urlPexels = risultatoJsonPexels[i].src.medium;
        // Creiamo l'immagine
        const imgPexels = document.createElement('img');
        imgPexels.src = image_urlPexels;
        resultsPexels.appendChild(imgPexels);
    }

    document.querySelector('#divider').classList.remove('hidden');
    document.querySelector('#results').classList.remove('resultsMargin');
    document.querySelector('#results').classList.add('marginNone');
}

function onResponse(response) {
    return response.json();
}

function search(event) {
    const search_input = document.querySelector('input[name="amazon"]:checked').value;
    const query = encodeURIComponent(search_input);
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    const formData = new FormData();
    formData.append('query', query);
    formData.append('_token', token);

    // Impedisci il submit del form
    event.preventDefault();
    // Esegui fetch
    fetch('equip/search', { method: 'POST', body: formData }).then(onResponse).then(onJson);
}

const form = document.querySelector('form');
form.addEventListener('submit', search)
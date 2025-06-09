


function onJSonCart(json){
    console.log("ciao")
    console.log(json.exists);
    const avviso = document.querySelectorAll(".result");

    if(json.exists === "login") {
        window.location.href = "login.php";
        return;
    }
    if (json.exists) {
        
        //alert("inserimento avvenuto senza successo");
        avviso[indice_botton].style.backgroundColor = "red";
        avviso[indice_botton].textContent = "inserimento avvenuto SENZA successo";
    
        
    } else {
        // alert("inserimento avvenuto con successo");
        avviso[indice_botton].textContent = "Inserimento avvenuto con successo";
    }
    
}


function onResponse(response) {
    if (!response.ok) return null;
     console.log("ciao")
    return response.json();
}

function aggiungiAlCarrello(event){
    const pulsante_premuto = event.currentTarget;
    indice_botton = parseInt(pulsante_premuto.dataset.index);
    const prod = document.querySelector(".titolo_descr h1[data-index='" + indice_botton + "']");
    
    console.log(prod);
    

    fetch("aggiungiElemento.php?titolo="+ encodeURIComponent(prod.textContent)).then(onResponse).then(onJSonCart);
}


let indice_botton;

function onJSonProdotti(json) {
    console.log("ciao elenco prodotti");
    console.log(json);
    const section = document.querySelector("section");

    for(let i = 0; i < json.length; i++){
        const blocco = document.createElement("div");
        blocco.classList.add("blocco");
        blocco.dataset.index = i;
        console.log(json[i].url);
        const immagine = document.createElement("img");
        immagine.src = json[i].url;
        immagine.dataset.index = i;

        const blocco_titolo = document.createElement("div");
        blocco_titolo.classList.add("titolo_descr");

        const titolo = document.createElement("h1");
        titolo.textContent = json[i].titolo;
        titolo.dataset.index = i;

        const descrizione = document.createElement("h4");
        descrizione.textContent = json[i].descrizione;
        descrizione.dataset.index = i;

        blocco_titolo.appendChild(titolo);
        blocco_titolo.appendChild(descrizione);

        const blocco_prezzo = document.createElement("div");

        const prezzo = document.createElement("h1");
        prezzo.textContent = json[i].prezzo + "$";
        prezzo.dataset.index = i;

        const pulsante = document.createElement("button");
        pulsante.textContent = "Add to cart";
        pulsante.dataset.index = i;

        const span = document.createElement("span");
        span.classList.add("result");
        blocco_titolo.appendChild(span);
        pulsante.addEventListener("click", aggiungiAlCarrello);


        blocco_prezzo.appendChild(prezzo);
        blocco_prezzo.appendChild(pulsante);

        blocco.appendChild(immagine);
        blocco.appendChild(blocco_titolo);
        blocco.appendChild(blocco_prezzo);

        section.appendChild(blocco);
        
    }
}

function caricaProdotti(){
    fetch("ElementiElenco.php").then(onResponse).then(onJSonProdotti);
}

caricaProdotti();
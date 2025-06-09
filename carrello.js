

function onJSonCart(json){
    console.log("ciao")
    console.log(json.exists);
    const blocco = document.querySelector(".blocco[data-index='" + indice_botton + "']");

    if (json.exists) {
        blocco.remove();
        console.log(json.somma);
        let decimali = 2;
        json.somma = Math.trunc(json.somma * Math.pow(10, decimali)) / Math.pow(10, decimali);
        
        document.querySelector(".somma h1").textContent = "Totale: " + (json.somma == null ? 0 : json.somma) + "$";
        if (json.somma === 0) {
            document.querySelector(".somma h1").remove();
            caricaCarrello();
        }
    }
    
}


function onResponse(response) {
    if (!response.ok) return null;
     console.log("ciao")
    return response.json();
}

function rimuovidalCarrello(event){
    const pulsante_premuto = event.currentTarget;
    indice_botton = parseInt(pulsante_premuto.dataset.index);
    const prod = document.querySelector(".titolo_descr h1[data-index='" + indice_botton + "']");
    
    
    console.log(prod);
    
   
    fetch("rimuoviElemento.php?titolo="+ encodeURIComponent(prod.textContent)).then(onResponse).then(onJSonCart);
}

let indice_botton;



function onJSonCarrello(json){
    console.log("ciao carrello");
    console.log(json);
    const section = document.querySelector("section");
    if (json.response.length === 0 || json.somma === 0) {
        const avviso = document.createElement("h1");
        avviso.classList.add("cart_vacancy");
        avviso.textContent = "Il tuo carrello è vuoto";

        const link = document.createElement("a");
        link.href = "elenco_prodotti.php";
        link.textContent = "CLICK HERE to discover all ours products! " ;
        link.classList.add("avviso");

       
       
        section.appendChild(avviso);
        section.appendChild(link);

    }

    for(let i = 0; i < json.response.length; i++){
        const blocco = document.createElement("div");
        blocco.classList.add("blocco");
        blocco.dataset.index = i;
        console.log(json.response[i].immagine);
        const immagine = document.createElement("img");
        immagine.src = json.response[i].immagine;
        immagine.dataset.index = i;

        const blocco_titolo = document.createElement("div");
        blocco_titolo.classList.add("titolo_descr");

        const titolo = document.createElement("h1");
        titolo.textContent = json.response[i].titolo;
        titolo.dataset.index = i;

        const descrizione = document.createElement("h4");
        descrizione.textContent = json.response[i].descrizione;
        descrizione.dataset.index = i;

        blocco_titolo.appendChild(titolo);
        blocco_titolo.appendChild(descrizione);

        const blocco_prezzo = document.createElement("div");

        const prezzo = document.createElement("h1");
        prezzo.textContent = json.response[i].prezzo + "$";
        prezzo.dataset.index = i;

        const pulsante = document.createElement("button");
        pulsante.textContent = "Remove from cart";
        pulsante.dataset.index = i;

        pulsante.addEventListener("click", rimuovidalCarrello);


        blocco_prezzo.appendChild(prezzo);
        blocco_prezzo.appendChild(pulsante);

        blocco.appendChild(immagine);
        blocco.appendChild(blocco_titolo);
        blocco.appendChild(blocco_prezzo);

        section.appendChild(blocco);
        
    }


    if (json.somma !== null){
        const blocco_somma = document.createElement("div");
        blocco_somma.classList.add("somma");
        const space = document.createElement("span");
        space.textContent = " ";
        const somma = document.createElement("h1");
        let decimali = 2;
        json.somma = Math.trunc(json.somma * Math.pow(10, decimali)) / Math.pow(10, decimali);
        somma.textContent = "Totale: " + json.somma + "$";
        blocco_somma.appendChild(space);
        blocco_somma.appendChild(somma);
        section.appendChild(blocco_somma);
    }
    


}

function caricaCarrello(){
    console.log("carico carrello");
    fetch("ElementiCarrello.php").then(onResponse).then(onJSonCarrello);
}

caricaCarrello();
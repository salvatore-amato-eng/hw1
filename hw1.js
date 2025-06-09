
function onJSonContenuti(json){
    console.log("ciao")
    console.log(json);
        for (let i = 0; i<4; i++) {
            const img = document.querySelectorAll(".immagini img")[i];
            img.src = json[i].URL;

            const titolo = document.querySelectorAll(".immagini h1")[i];
            titolo.textContent = json[i].TITOLO;

            const descrizione = document.querySelectorAll(".immagini h4")[i] ;
            descrizione.textContent = json[i].DESCRIZIONE;

            const prezzo = document.querySelectorAll(".immagini h3")[i];
            prezzo.textContent = json[i].PREZZO + "$";



        }
    
}


function onResponseContenuti(response) {
    if (!response.ok) return null;
    return response.json();
}


function caricaContenuti(){
    fetch("carica_contenuti.php").then(onResponseContenuti).then(onJSonContenuti);
}
caricaContenuti();


function onFocus(event){
    const bars = event.currentTarget;
    if(bars.value.length === 0 || bars.value === 'Search a part number' || bars.value === 'Your Email Address') {
        bars.value = '';
    }
    console.log("focus");
    bars.removeEventListener("focus",onFocus);
}

function onBlur(event){
    const barra = event.currentTarget;
    if(barra.value.length == 0){
        barra.value = 'Search a part number';
    }
    console.log("blur");
    barra.addEventListener("focus",onFocus);
}

function onBlur2(event){
    const barra = event.currentTarget;
    if(barra.value.length == 0){
        barra.value = 'Your Email Address';
    }
    console.log("blur");
    barra.addEventListener("focus",onFocus);
}

const bar = document.querySelector("input");
bar.addEventListener("focus",onFocus);
bar.addEventListener("blur",onBlur);

const bar_mobile = document.querySelector("#menu input");
bar_mobile.addEventListener("focus",onFocus);
bar_mobile.addEventListener("blur",onBlur);

const newsletter = document.querySelector("#footer_container input");
newsletter.addEventListener("blur",onBlur2);
newsletter.addEventListener("focus",onFocus);


function cambiaSfondoDX(event){

    const intestazione = document.querySelector("header");
    if (intestazione.className !== "immagine2"){

        intestazione.classList.add("immagine2");

        const testo = document.querySelector("header h1");
        testo.textContent = "Simple and high-efficiency IA monolithic buck converter";

        const testo2 = document.querySelector("header h4");
        testo2.textContent = "Ideal for major appliances and industrial power conditioning.";

        const pulsante = document.querySelector("header .ordina");
        pulsante.textContent = "Get Free Examples";
    } else {
        intestazione.classList.remove("immagine2");
        const testo = document.querySelector("header h1");
        testo.textContent = "New ST MEMS Sensors motherboard accepts all  ST DIL24 adapters";

        const testo2 = document.querySelector("header h4");
        testo2.textContent = "Empower your projects with effortness plug-and-play evaluation of MEMS Sensors.";

        const pulsante = document.querySelector("header .ordina");
        pulsante.textContent = "Order Now";
    }

    
}

const maggiore = document.querySelector("#maggiore h1");
maggiore.addEventListener("click",cambiaSfondoDX);

function cambiaSfondoSX(event){
    const intestazione = document.querySelector("header");
    if (intestazione.className === "immagine2"){
        intestazione.classList.remove("immagine2");

        const testo = document.querySelector("header h1");
        testo.textContent = "New ST MEMS Sensors motherboard accepts all  ST DIL24 adapters";

        const testo2 = document.querySelector("header h4");
        testo2.textContent = "Empower your projects with effortness plug-and-play evaluation of MEMS Sensors.";

        const pulsante = document.querySelector("header .ordina");
        pulsante.textContent = "Order Now";
    } else {
        intestazione.classList.add("immagine2");
        const testo = document.querySelector("header h1");
        testo.textContent = "Simple and high-efficiency IA monolithic buck converter";

        const testo2 = document.querySelector("header h4");
        testo2.textContent = "Ideal for major appliances and industrial power conditioning.";

        const pulsante = document.querySelector("header .ordina");
        pulsante.textContent = "Get Free Examples";
    }

}

const minore = document.querySelector("#minore h1");
minore.addEventListener("click",cambiaSfondoSX);



function onJSonCart(json){
    console.log("ciao")
    console.log(json.exists);
    const spans = document.querySelectorAll(".immagini span")
    for (const span of spans) 
        span.remove();

    if(json.exists === "login") {
        window.location.href = "login.php";
        return;
    }

    const avviso = document.createElement("span");
    avviso.classList.add("result");
    const blocco = document.querySelectorAll(".immagini");
    
    
    if (json.exists) {
        avviso.textContent = "inserimento avvenuto SENZA successo";
        avviso.style.backgroundColor = "red";
        blocco[indice_botton].appendChild(avviso);
        
        
    } else {
        avviso.textContent = "Inserimento avvenuto con successo";
        blocco[indice_botton].appendChild(avviso);
        
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
    const prod = document.querySelectorAll(".immagini h1");
    const descr = document.querySelectorAll(".immagini h4");
    const price = document.querySelectorAll(".immagini h3");
    const img = document.querySelectorAll(".immagini img");
    
    console.log(prod[indice_botton]);
    console.log(indice_botton);

    const immagine = img[indice_botton];
    
    const titolo_prod = prod[indice_botton];
    console.log(titolo_prod.textContent);

    const descrizione = descr[indice_botton];
    console.log(descrizione.textContent);

    const prezzo = price[indice_botton];
    console.log(prezzo.textContent);
    console.log(encodeURIComponent(prezzo.textContent));


    fetch("aggiungiElementodaApi.php?titolo="+encodeURIComponent(titolo_prod.textContent)+
                                    "&descrizione="+encodeURIComponent(descrizione.textContent) +
                                    "&prezzo=" + prezzo.textContent.replace(",",".") +
                                    "&link="+encodeURIComponent(immagine.src)
        ).then(onResponse).then(onJSonCart);
}


let indice_botton;
const pulsante = document.querySelectorAll(".addCart");
for(let i = 0; i < pulsante.length;i++) {
    pulsante[i].addEventListener("click",aggiungiAlCarrello);
}



function onJson1(json) {
    console.log("JSON ricevuto");
    console.log(json);

    const spans = document.querySelectorAll(".immagini span")
    for (const span of spans) 
        span.remove();
    
    let numero_prod = json.SearchResults.NumberOfResult;
    console.log(numero_prod);

    if (numero_prod > 4) {
        numero_prod = 4;
        console.log(numero_prod);
    }

    for (let i = 0; i < numero_prod; i++ ){
        const part_prodotto = json.SearchResults;
        console.log(part_prodotto);
        console.log(part_prodotto.Parts[i]);
        console.log(part_prodotto.Parts[i].Description)
        console.log(part_prodotto.Parts[i].PriceBreaks[0].Price);

    
        const img = document.querySelectorAll(".prodotti .immagini img");
        const image_prod = part_prodotto.Parts[i].ImagePath;
        img[i].src = image_prod;

        const title = document.querySelectorAll(".prodotti .immagini h1");
        const part_number_prod = part_prodotto.Parts[i].ManufacturerPartNumber;
        title[i].textContent=part_number_prod;

        const subtitle = document.querySelectorAll(".prodotti .immagini h4");
        const descr_prod = part_prodotto.Parts[i].Description;
        subtitle[i].textContent = descr_prod;

        const prezzo = document.querySelectorAll(".prodotti .immagini h3");
        prezzo[i].textContent = part_prodotto.Parts[i].PriceBreaks[0].Price;
        document.querySelectorAll(".prodotti .immagini")[i].appendChild(prezzo[i]);

        const pulsante = document.querySelectorAll(".addCart");
        document.querySelectorAll(".prodotti .immagini")[i].appendChild(pulsante[i]);



    }
}

function onResponse(response) {
    console.log('Risposta ricevuta', response);
    if (response.ok)
        return response.json();
}



function search(event){
    
    const prodotto_value = encodeURIComponent(event.currentTarget.value);

    const request = {
        "SearchByPartRequest": {
        "mouserPartNumber": prodotto_value,
        "partSearchOptions": 'None'
        }
    }

    const richiesta = JSON.stringify(request);
    console.log(richiesta);

    console.log('Eseguo ricerca prodotti: ' + prodotto_value);
   
    fetch('api_rest_products.php?partnumber='+ prodotto_value).then(onResponse).then(onJson1);

    
} 

const barra_search = document.querySelector('input');
barra_search.addEventListener('change', search);

const barra_search_mobile = document.querySelector('#menu input');
barra_search_mobile.addEventListener('change', search);


function onJson2(json) {
    
    console.log(json);

    let numero_notizie = json.totalResults;
    if (numero_notizie > 4  ){
        numero_notizie= 4;
        console.log(numero_notizie);
    }

    const avviso = document.createElement("h5");
    avviso.textContent = "Premi ESC per chiudere questa finestra";
    avviso.classList.add("testo_avviso_modal");
    document.querySelector("#modal_view").appendChild(avviso);

    for(let i = 0; i< numero_notizie ;i++){
        console.log("ciclo");
        const blocco_news = document.createElement("div");
        blocco_news.classList.add("forma_notizie")
        const blocco_sx = document.createElement("div");

        

        const titolo = json.articles[i].title;
        const immagine = json.articles[i].urlToImage;
        const descrizione = json.articles[i].description;
        const link_notice = json.articles[i].url;
        const name_journal = json.articles[i].source.name;
        const date = json.articles[i].publishedAt;

        const title = document.createElement("h1")
        title.textContent = titolo;
        console.log[titolo]

        const image = document.createElement("img");
        image.src = immagine;

        const descr_notice = document.createElement("p");
        descr_notice.textContent = descrizione;

        const colleg_notice = document.createElement("a");
        colleg_notice.textContent = link_notice;
        colleg_notice.href=link_notice;

        const giornale = document.createElement("a");
        giornale.textContent = name_journal;
        giornale.href = name_journal;
        

        const data = document.createElement("span");
        data.textContent="Data e Ora dell'articolo: " + date;

        blocco_sx.appendChild(title);
        blocco_sx.appendChild(descr_notice);
        blocco_sx.appendChild(colleg_notice);
        blocco_sx.appendChild(giornale);
        blocco_sx.appendChild(data);


        blocco_news.appendChild(blocco_sx);
        blocco_news.appendChild(image);

        document.querySelector("#modal_view").appendChild(blocco_news);
    }

    document.body.classList.add("no-scroll");
    document.querySelector("#modal_view").style.top= window.pageYOffset + 'px';
    document.querySelector("#modal_view").classList.remove("hidden");
    
}

function chiudi_modale(event){
    console.log("provo funzione chiudi");
    const mod = document.querySelector("#modal_view");
    if (event.key === "Escape"){
        document.body.classList.remove("no-scroll");
        console.log("Tasto Esc premuto!");
        mod.classList.add("hidden");
        mod.innerHTML=''; 
    }
}

document.addEventListener("keydown",chiudi_modale);


function news(event){


    console.log('Eseguo ricerca notizie: ');

    const ricerca = "STmicroelectronics"
    
    fetch('api_rest_news.php?notizia='+ encodeURIComponent(ricerca)).then(onResponse).then(onJson2);


  
} 

const tasto_news = document.createElement("button");
tasto_news.textContent = "ST news";
tasto_news.classList.add("notizie");
const navbar = document.querySelector("#navleft");
navbar.appendChild(tasto_news);

tasto_news.addEventListener("click",news);
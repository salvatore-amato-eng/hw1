function validazioneDati(event) {
    const termini = document.querySelector("#accetta_termini");
    const span  = document.querySelector(".check_error");
    
    if(termini.checked === false ){
        event.preventDefault();
        span.textContent="Accetta i termini!";
        
    }

    if(termini.checked === true && form.first_name.value.length === 0 || form.last_name.value.length === 0 || form.email.value.length === 0 || form.email_confirm.value.length === 0 || form.password.value.length === 0 || form.repeat_password.value.length === 0) {
        event.preventDefault();
        span.textContent="compila tutti i campi!";
        
    }
    
}

function controllaNome(event){
    const name = event.currentTarget;
    const span  = document.querySelector(".name_error");
    if (name.value.length > 0 ){
        name.classList.remove("error");
        span.textContent ="" ;
    } else {
        span.textContent ="Inserisci un nome corretto" ;
    }
}

function controllaCognome(event){
    const surname = event.currentTarget;
    const span  = document.querySelector(".surname_error");
    if (surname.value.length > 0 ){
        surname.classList.remove("error");
         span.textContent ="" ;
    } else {
        surname.classList.add("error");
        span.textContent ="Inserisci un cognome corretto" ;
    }
}

function jsonCheckEmail(json) {
    const span  = document.querySelector(".email_error");
    if (json.exists === true ) {
        span.textContent = "Email già utilizzata"
    } else {
        span.textContent = "";
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function controllaEmail(event){
    const indirizzo = event.currentTarget;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(indirizzo.value).toLowerCase())) {
        indirizzo.classList.add('error');
    } else {
        indirizzo.classList.remove('error')
        fetch("controlla_email.php?q="+ encodeURIComponent(String(indirizzo.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function controllaEmailUguale(){
    const span  = document.querySelector(".email_matching_error");
    if(form.email.value !== form.email_confirm.value ){
        span.textContent = "Le email non coincidono";
    } else {
        span.textContent = "";
    }
}

function controllaPasswordUguale(){
    const span  = document.querySelector(".password_matching_error");
    if(form.repeat_password.value !== form.password.value ){
        span.textContent = "Le password non coincidono";
    } else {
        span.textContent = "";
    }
}



const form = document.forms["registration"];
form.addEventListener("submit",validazioneDati);
const nome = document.querySelector("form").first_name.addEventListener("blur",controllaNome);
const cognome = document.querySelector("form").last_name.addEventListener("blur",controllaCognome);
const email = document.querySelector("form").email.addEventListener("blur",controllaEmail);
const email_confirm = document.querySelector("form").email_confirm.addEventListener("blur",controllaEmailUguale);
const repeat_password = document.querySelector("form").repeat_password.addEventListener("blur",controllaPasswordUguale);
/* Gestió de l'àlies a l'inici */
const adresa = document.getElementById("url");
const origen = document.getElementById("tag");
const aAlias = document.getElementById("alertaAlias");
const botoEnviar = document.getElementById("botoEnviar");
const direccio = adresa.value;
const etiqueta = origen.value;
const dadesAfegir = '{"url": '+direccio+', "alias": '+etiqueta+', "metode": "afegir"}';

const inputHandler = function(e) {
    var elMeuRegex = /^([a-zA-Z0-9\-_])*$/;
    var resultat = elMeuRegex.test(e.target.value);
    if (resultat === false) {
        aAlias.style.display="block";
        botoEnviar.disabled=true;
    } else {
        aAlias.style.display="none";
        botoEnviar.disabled=false;
    }
}


origen.addEventListener('input', inputHandler);
botoEnviar.addEventListener('click', function(){
   alert(JSON.stringify(dadesAfegir));
    enviaDades("https://fuab.cc/crud.php",dadesAfegir).
    then((response) => {
        console.log(response);
    }).catch((error) => {
        console.error("Error: ",error);
    });
   
});

async function enviaDades (url="",dades = {}) {
    const response = await fetch (url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: dadesAfegir
    });
    return await response.json();
}
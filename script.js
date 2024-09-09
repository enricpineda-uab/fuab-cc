/* Gestió de l'àlies a l'inici */
const adresa = document.getElementById("url");
const origen = document.getElementById("tag");
const aAlias = document.getElementById("alertaAlias");
const aURL = document.getElementById("alertaURL");
const botoEnviar = document.getElementById("botoEnviar");
const formShortener = document.getElementById("formcreador");

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

const isValidHttpUrl= function(str) {
    const pattern = new RegExp(
      '^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', // fragment locator
      'i'
    );
    var resulto = pattern.test(str.target.value);
    if (resulto === false) {
        aURL.style.display="block";
        botoEnviar.disabled=true;
    } else {
        aURL.style.display="none";
        botoEnviar.disabled=false;
    }
  }

origen.addEventListener('input', inputHandler);
adresa.addEventListener('blur', isValidHttpUrl);
botoEnviar.addEventListener('submit', function(){
    var direccio = document.getElementById("url").value;
    var etiqueta = document.getElementById("tag").value;
    const dadesAfegir = {"url": direccio, "alias": etiqueta, "metode": "afegir"};

    enviaDades("https://fuab.cc/crud.php",dadesAfegir).
    then((response) => {
        //console.log(response);
        document.getElementById("capsula").innerHTML = "<p>Aquesta és la nova adreça curta que has creat:</p><p class=\"resultat\"><a href=\""+response+"\">"+response+"</a></p><p><img src=\"https://api.qrserver.com/v1/create-qr-code/?data="+encodeURI(response)+"&size=200x200\"></p><p><a href=\"https://api.qrserver.com/v1/create-qr-code/?data="+encodeURI(response)+"&format=svg\">Descarrega't el codi QR en format SVG per imprimir</a></p><p><a href=\"#\" onClick=\"javascript: location.reload();\"><strong>Fes una altra adreça curta.</strong></a></p>";
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
        body: JSON.stringify(dades)
    });
    return await response.json();
}


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUAB.CC - Acurtador web de la FUAB</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
      <div id="capsula">
        <img src="img/logo-fuab.png" id="logofuab"/>
        <h1>Acurtador web FUAB</h1>
        <p>Introdueix la URL que vulguis acurtar al camp següent:
        <form>
            <input type="text" name="url" id="url"><br />
            <p class="alerta" id="alertaURL">La URL no té un format correcte!</p>

            <p>Pots personalitzar la teva adreça posant un sufix a continuació. Només lletres, números i guions:</p>
            <input type="text" name="tag" id="tag"><br />
            <p class="alerta" id="alertaAlias">L'àlies te caràcters no permesos!</p>
            
            <p><button type="button" class="boto" id="botoEnviar">Enviar</button></p>
            <p>&nbsp;</p>
            <p class="peu">© Promoció i Comunicació de la FUAB. Podeu contactar a través del correu <a href="mailto: promocio.fuab@uab.cat">promocio.fuab@uab.cat</a></p>
            <p class="peu"><a href="https://github.com/enricpineda-uab/fuab-cc">Codi font disponible sota llicència GNU a Github.</p>
        </form>  
      </div>
    </main>
	<script src="./script.js"></script>
  </body>
</html>
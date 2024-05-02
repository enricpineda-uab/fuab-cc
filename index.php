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
        <h1>Acurtador web FUABCC</h1>
        <form>
            <input type="text" name="url">
            <input type="checkbox" name="custom" id="custom" onClick="mostraCustom();"> Vols personalitzar l'adreça?
            <div id="customField"><input type="text" name="tag" id="tag"></div>
        </form>  
    </main>
	<script src="./script.js"></script>
  </body>
</html>
<?php
$c = $_GET['c'];
//$id = $_GET['id'];
$db = new SQLite3('baldrick.db');
if (ctype_digit($c)=== true){
$query = $db->querySingle("select rowid,url,alias from adreces where rowid='$c'", true);
} else {
    $query = $db->querySingle("select rowid,url,alias from adreces where alias='$c'", true);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUAB.CC - Escurçador web de la FUAB</title>
    <base href="https://fuab.cc/">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    
<?php
/* 
 $protocol = isset($_SERVER['HTTPS']) && 
 $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
 $base_url = $protocol . $_SERVER['HTTP_HOST'];
  
*/
 ?>
 
  </head>
  <body>
    <main>
      <div id="capsula">
        <img src="img/logo-fuab.png" id="logofuab"/>
        <h1>Escurçador web FUAB</h1>
        
        <form>
            <input type="text" name="url" id="url" value="<?php echo $query['url'];?>"><br />
            <p class="alerta" id="alertaURL">La URL no té un format correcte!</p>

            <p>Pots personalitzar la teva adreça posant un sufix a continuació. Només lletres, números i guions:</p>
            <input type="text" name="tag" id="tag" value="<?php echo $query['alias'];?>"><br />
            <p class="alerta" id="alertaAlias">L'àlies te caràcters no permesos!</p>
            <input type="hidden" id="id" name="id" value="<?php echo $query['rowid'];?>">
            <input type="hidden" id="metode" value="modificar">
            <p><button type="button" class="boto" id="botoEnviar">Enviar</button></p>
            <p>&nbsp;</p>
        </form>  
        <?php include("peu.html");?>
      </div>
    </main>
	<script src="script.js"></script>
  </body>
</html>
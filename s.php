<?php
$c = $_GET['c'];
//$id = $_GET['id'];
$db = pg_connect("host=localhost dbname=fuabcc user=fuabcc password=15Maig1977!");
if (ctype_digit($c)=== true){
$query = "select id,url from adreces where id='$c'";
} else {
    $query = "select id,url from adreces where alias='$c'";
}
$result = pg_query($db,$query);
$desti = pg_fetch_row($result,0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUAB.CC - Escurçador web de la FUAB</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
      <div id="capsula">
        <img src="/img/logo-fuab.png" id="logofuab"/>
        <h1>Escurçador web FUAB</h1>
        <p>Dades estadístiques de l'adreça <strong>https://fuab.cc/<?php echo $c;?>/</strong>:
        <table class="taulaResultats">
            <tr>
                <th>Dia</th>
                <th>Nombre de clicks</th>
</tr>
        <?php
        $result2 = pg_query($db,"select log.dataconsulta, count(log.idurl) as counter from log,adreces where log.idurl = adreces.id and adreces.id = '".$desti[0]."' group by log.dataconsulta order by log.dataconsulta");  
        while ($fila = pg_fetch_row($result2)) {
        ?>
        <tr>
            <td><?php echo $fila[0];?></td>
            <td><?php echo $fila[1];?></td>
        <?php } ?>
        </table>
        <?php include("peu.html");?>
      </div>
    </main>
	<script src="./script.js"></script>
  </body>
</html>
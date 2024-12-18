<?php
$c = $_GET['c'];
//$id = $_GET['id'];
$db = new SQLite3('baldrick.db');
if (ctype_digit($c)=== true){
$query = $db->querySingle("select rowid,url from adreces where id='$c'", true);
} else {
    $query = $db->querySingle("select rowid,url from adreces where alias='$c'", true);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUAB.CC - Escurçador web de la FUAB</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
      <div id="capsula">
        <img src="/img/logo-fuab.png" id="logofuab"/>
        <h1>Escurçador web FUAB</h1>
        <p>Dades estadístiques de l'adreça <strong>https://fuab.cc/<?php echo $c;?>/</strong></p>
        <p>Adreça de destí:<br><?php echo $query['url'];?>
        <table class="taulaResultats">
            <tr>
                <th>Dia</th>
                <th>Nombre de clicks</th>
</tr>
        <?php
        $query2 = $db->query("SELECT dataconsulta, COUNT(*) AS counter FROM log WHERE id = '".$c."' GROUP BY dataconsulta");
        
        while ($fila = $query2->fetchArray(SQLITE3_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $fila['dataconsulta'];?></td>
            <td><?php echo $fila['counter'];?></td>
        <?php } 
        $db->close();
        ?>
        </table>
        <?php include("peu.html");?>
      </div>
    </main>
	<script src="./script.js"></script>
  </body>
</html>
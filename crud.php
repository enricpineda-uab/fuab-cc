<?php
include 'f.php';
// Agafem les dades
$json = file_get_contents('php://input');
$dades = json_decode($json);

switch ($dades->metode) {
    case "afegir":
        $ordre = "INSERT INTO adreces (url,alias) values ('".$dades->url."','".$dades->alias."') RETURNING id";
        break;
    case "modificar":
        $ordre = "UPDATE adreces SET url='".$dades->url."', alias='".$dades->alias."' where id='".$dades->id."' RETURNING id";
        break;
}

$db = connectaDB();
$result = pg_query($db,$ordre);
$desti = pg_fetch_row($result,0);
if ($dades->alias != "") {
    $missatge = "https://fuab.cc/".$dades->alias."/";
} else {
$missatge = "https://fuab.cc/".$desti[0]."/";
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($missatge);
?>
<?php
// Agafem les dades
$json = file_get_contents('php://input');
$dades = json_decode($json);

switch ($dades->metode) {
    case "afegir":
        $ordre = "INSERT INTO adreces (url,alias) values ('".$dades->url."','".$dades->alias."') RETURNING id";
}

$db = pg_connect("host=localhost dbname=fuabcc user=fuabcc password=15Maig1977!");
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
<?php
// include 'f.php';
// Agafem les dades
$json = file_get_contents('php://input');
$dades = json_decode($json);
$db = new SQLite3('baldrick.db');
switch ($dades->metode) {
    case "afegir":
        $ordre = "INSERT INTO adreces (url,alias) values (:adreca, :alias)";
        $sent = $db->prepare($ordre);
        $sent->bindValue(':adreca', $dades->url);
        $sent->bindValue(':alias', $dades->alias);
        break;
    case "modificar":
        $ordre = "UPDATE adreces SET url=:adreca, alias=:alias where rowid=:id RETURNING rowid";
        $sent = $db->prepare($ordre);
        $sent->bindValue(':adreca', $dades->url);
        $sent->bindValue(':alias', $dades->alias);
        $sent->bindValue(':id', $dades->id);
        break;
}
$sent->execute();

if ($dades->alias != "") {
    $missatge = "https://fuab.cc/".$dades->alias."/";
} else {
    if ($dades->id && $dades->id != "") {
        $missatge = "https://fuab.cc/".$dades->id."/";
    } else {
        $missatge = "https://fuab.cc/".$db->lastInsertRowid()."/";
    }
}

$db->close();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($missatge);
?>
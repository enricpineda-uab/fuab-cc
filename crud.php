<?php
// Agafem les dades
$json = file_get_contents('php://input');
$dades = json_decode($json);

$missatge = "Si ha anat bé, el mètode escollit és ".$dades=>metode;
header('Content-Type: application/json; charset=utf-8');
echo json_encode($missatge);
?>
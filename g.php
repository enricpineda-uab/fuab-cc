<?php
$c = $_GET['c'];
//$id = $_GET['id'];

$db = new SQLite3('baldrick.db');
$query = $db->querySingle("select rowid,url,alias from adreces where alias='$c'", true);
$avui = date("Y-m-d");

$stmt = $db->prepare("INSERT INTO log (id,dataconsulta) values (:c1, :c2)");
$stmt->bindValue('c1',$c);
$stmt->bindValue('c2', $avui);
$stmt->execute();

$db->close();
header("Location: ".$query['url']);
?>
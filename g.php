<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$c = $_GET['c'];
//$id = $_GET['id'];
$db = pg_connect("host=localhost dbname=fuabcc user=fuabcc password=15Maig1977!");
if (ctype_digit($c)=== true){
$query = "select url from adreces where id='$c'";
} else {
    $query = "select url from adreces where alias='$c'";
}
$result = pg_query($db,$query);
$desti = pg_fetch_row($result,0);
//echo $desti[0];
pg_close($db);
header("Location: ".$desti[0]);
?>
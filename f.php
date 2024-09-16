<?php
function connectaDB() {
    $db = pg_connect("host=localhost dbname=fuabcc user=fuabcc password=15Maig1977!");
    return $db;
}
?>
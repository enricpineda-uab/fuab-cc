<?php
// Processa els camps del formulari
foreach ($_POST as $key => $value) {
    $$key = $value;
}

?>
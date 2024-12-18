<?php
$db = new SQLite3('percy.db');
/*$db->exec('create table log (id int, dataconsulta string)');*/
$db->query("alter table 'public.log' rename to 'log'");
$db->query("alter table log drop column id");
$db->query("alter table log rename column idurl to id");
$pregunta = $db->query("PRAGMA table_info('log');");
while ($table = $pregunta->fetchArray(SQLITE3_ASSOC)) {
    echo $table['name']."<br/>";
}
$db->close();
echo "Ja ho tens!";
?>
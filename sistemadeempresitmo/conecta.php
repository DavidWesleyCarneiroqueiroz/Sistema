<?php
$link = mysql_connect('localhost:3306', 'root', '');

if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

 $db_selected = mysql_select_db('dbemprestimo', $link);

if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>
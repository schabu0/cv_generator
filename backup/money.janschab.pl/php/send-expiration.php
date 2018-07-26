<?php

require_once('../php/db_settings.php');

$value_1 = $_POST["v_1"];

$Q=$mysql->query('INSERT INTO data_worn ( id ) VALUES ( \''.$value_1.'\' )');
$Q=$mysql->query('UPDATE data SET usefulness=2 WHERE id = '.$value_1.'');


echo "Success!";
?>
 
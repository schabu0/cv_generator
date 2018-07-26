<?php

require_once('../php/db_settings.php');

$value_1 = $_POST["v_1"];
$value_2 = $_POST["v_2"];
$value_3 = $_POST["v_3"];
$value_4 = $_POST["v_4"];
$date = date('Y-m-d H:i:s');

for( $i = 0; $i < $value_3; $i++ ) {
	$Q=$mysql->query('INSERT INTO data ( name, price, add_date, usefulness ) VALUES ( \''.$value_1.'\', \''.$value_2.'\', \''.$date.'\', \''.$value_4.'\' )');
}

echo "Success!";
?>

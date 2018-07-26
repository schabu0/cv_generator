<?php

$q = $_GET['q'];
require_once('../db_settings.php');


$mysql->query('SET NAMES utf8');
$mysql->query('SET CHARACTER_SET utf8_unicode_ci');

$Q=$mysql->query('SELECT * FROM ftg WHERE title LIKE "%'.$q.'%" ');

while($rekord = $Q->fetch_assoc()){



echo $rekord['title']."[[".$rekord['artist']."[[".$rekord['group'].",,";
}

?>

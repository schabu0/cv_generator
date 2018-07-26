<?php

$q = $_GET['q'];
require_once('../db_settings.php');

$ist = 0;
$S=$mysql->query('SELECT ftg.id, ftg_data.id FROM ftg, ftg_data WHERE ftg.id = ftg_data.id AND ftg.title = "'.$q.'"');
while($rekord = $S->fetch_assoc()){
    $ist = $rekord['id'];
}

if( $ist == 0 ){
    $T=$mysql->query('SELECT id FROM ftg WHERE title = "'.$q.'" ');
    while($rekord = $T->fetch_assoc()){
        $ist = $rekord['id'];
    }
    $W=$mysql->query('INSERT INTO ftg_data (id) VALUES ( '.$ist.' ) ');
}
$R=$mysql->query('UPDATE ftg_data SET ftg_data.vievs = ftg_data.vievs + 1 WHERE ftg_data.id = '.$ist );




$Q=$mysql->query('SELECT * FROM ftg WHERE title = "'.$q.'" ');
while($rekord = $Q->fetch_assoc()){
    echo $rekord['value'];
}

?>

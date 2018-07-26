<?php

$mysql = new mysqli('sql.tedu.nazwa.pl', 'tedu_money', 'JanSchab0', 'tedu_money');

if(mysqli_connect_errno()){
	echo"Brak połączenia z serwerem MySQL.";
	exit;
}

$mysql->query('SET NAMES utf8');
$mysql->query('SET CHARACTER_SET utf8_unicode_ci');

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Roboto:300,400,900&amp;subset=latin-ext" rel="stylesheet">
    <link rel="Shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>

<body>
	<?php require_once('php/db_settings.php'); ?>

	<div id="warning"></div>

	<div id="app">
		
		<div class="box input product-input">
			<form onsubmit="return false;">
				<label>name</label><!--name of thing - type or select ^ -->
				<input type="text" list="datalist" id="data-input-name"><!--
	         --><datalist id="datalist">
	                <?php
	                    $Q=$mysql->query('SELECT name, COUNT(*) FROM data GROUP BY name ORDER BY COUNT(*) DESC');
	                    while($rekord = $Q->fetch_assoc()){
	                    echo '<option value="'.$rekord['name'].'">';
	                    }
	                ?>
	            </datalist><!--
	         --><label>quantity</label><!--autouzupełnianie z bazy danych-->
				<input type="text" value="1" id="data-input-quantity">
				<label>price</label><!--autouzupełnianie z bazy danych-->
				<input type="text" id="data-input-price">
				<label class="checkbox">usefulness<input type="checkbox" id="data-input-perm"><span></span></label>
				
				<button id="button-add">ADD</button>
			</form>
		</div>

		<div class="box expiration-monitor">

			<?php
                $Q=$mysql->query('SELECT id, name, usefulness FROM data WHERE usefulness = 1 ');
                while($rekord = $Q->fetch_assoc()){
                echo '<div class="item"><div class="button-check button-worn" data-item_id="'.$rekord['id'].'"></div><p>'.$rekord['name'].'</p></div>';
                }
            ?>

        </div>
        <div class="box expiration-monitor">

            <?php
                $Q=$mysql->query('SELECT id, name, COUNT(*), usefulness FROM data GROUP BY name');
                while($rekord = $Q->fetch_assoc()){
                echo '<div class="item"><p>'.$rekord['name'].'*'.$rekord['COUNT(*)'].'</p></div>';
                }
            ?>

		</div>
	</div>

    
    <script src="js/script.js"></script>
</body>

</html>
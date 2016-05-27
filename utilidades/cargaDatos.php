<?php
	
	include('bd.php');

	for($i=0;$i<10;$i++){
		$nombre=rand(300,3000);
		echo $nombre;
		$query = "INSERT INTO `mesas`(`nombre`) VALUES ('$nombre');";
		$result = $mysqli->query($query);
	}
	for($i=0;$i<10;$i++){
			$nombre=rand(300,3000);
			echo $nombre;
			$query = "INSERT INTO `platos`(`nombre`,`tiempo`) VALUES ('$nombre','$tiempo');";
			$result = $mysqli->query($query);
		}






 ?>
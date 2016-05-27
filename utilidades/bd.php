<?php
    $host_db = "localhost"; // Host de la BD
    $usuario_db = "root"; // Usuario de la BD
    $clave_db = ""; // Contraseña de la BD
    $nombre_db = "restaurante"; // Nombre de la BD    
    
    //conectamos y seleccionamos db
    $mysqli = new mysqli($host_db , $usuario_db, $clave_db, $nombre_db);
    
    if(!$mysqli) {
			die ("<h3>Error Conecting to MysQl</h3>"); 
		}
?>
<?php 
include("bd.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query="DELETE FROM `platos` WHERE `id_plato`=$id";
	$mysqli->query($query);
	header("Location: productos.php");
}

?>
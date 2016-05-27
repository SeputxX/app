<?php 
include("bd.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query="DELETE FROM `mesas` WHERE `idmesa`=$id";
	$mysqli->query($query);
	header("Location: mesas.php");
}

?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<body onresize="centrar()" onload="inicio()">
<?php 
include("bd.php");



if(isset($_GET['id']) ){
	$id=$_GET['id'];
	$query="SELECT * FROM `mesas` WHERE `idmesa`=$id;";
	$resultado=$mysqli->query($query);
	$mesa = $resultado->fetch_array(MYSQLI_BOTH);
	$nombre=$mesa['nombre'];	
}
if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
			
		$query2="UPDATE `mesas` SET `nombre`='$nombre' WHERE `idmesa`=$id";
		$result2=$mysqli->query($query2);
		
		header("Location: mesas.php");	}

?>
<div id="contenedor" class="campo">
<form method="POST">
		Nombre:<input type="text" value='<?php echo $nombre ?>' name="nombre"><br>
		<button class='cbttn' type="submit">Modificar</button>
</form>
<a href="mesas.php"><button class='cbttn cerrar' >Cerrar</button></a>
</div>
</body>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<body onresize="centrar()" onload="inicio()"><div id="contenedor" class="campo">
<?php 
include("bd.php");

if(isset($_GET['id']) ){
	$id=$_GET['id'];
	$query="SELECT * FROM `platos` WHERE `id_plato`=$id;";
	$resultado=$mysqli->query($query);
	$plato = $resultado->fetch_array(MYSQLI_BOTH);
	$nombre=$plato['nombre'];
	$tiempo=$plato['tiempo'];

	$horas = floor($tiempo / 3600);
	$minutos = floor(($tiempo - ($horas * 3600)) / 60);
	$segundos = $tiempo - ($horas * 3600) - ($minutos * 60);

	
	
}
if(isset($_POST['nombre'])){
		$nombre2=$_POST['nombre'];
		$horas2 = $_POST['horas'];
		$minutos2 = $_POST['minutos'];
		$segundos2=$_POST['segundos'];
		$total =$segundos2+($horas2*3600)+($minutos2*60);
		echo $horas2.":".$minutos2.":".$segundos2;
		
	
		$query2="UPDATE `platos` SET `nombre`='$nombre2',`tiempo`=$total WHERE `id_plato`=$id";
		$result2=$mysqli->query($query2);
		
		header("Location: productos.php");
	}

?>
<form method="POST">
		Nombre:<input type="text" value='<?php echo $nombre ?>' name="nombre"><br>
		Tiempo:<input type="text" name="horas" size="2" value="<?php echo $horas ?>">:<input type="text" name="minutos" size="2" value="<?php echo $minutos ?>">:<input type="text" name="segundos" size="2" value="<?php echo $segundos ?>">
		<button class='cbttn' type="submit">Modificar</button>
</form>
<a href="productos.php"><button class='cbttn cerrar'>Cerrar</button></a>

</div>
</body>
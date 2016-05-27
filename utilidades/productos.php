<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
<body onresize="centrar()" onload="inicio()">
<div id="contenedor">
<div class="container">
<?php
ob_start();
include("bd.php");
include("utilidades.php");
if(isset($_GET['mesa'])){
	$mesa=$_GET['mesa'];

	 

	 $query="SELECT * FROM platos";
	 $resultado=$mysqli->query($query);

	 while ($plato = $resultado->fetch_array(MYSQLI_BOTH)){

	 	$tiempo=conversorTiempos($plato['tiempo']);

		echo "<div class='reci'><button class='plato otro' onclick='addplato(".$plato['id_plato'].",\"". $plato['nombre']."\",".$plato['tiempo'].",".$mesa.")' class='plato' value=\"".$plato['id_plato']."\">".$plato['nombre']."<br>".$tiempo."</button></div>";
		
	}
}else{
	$query="SELECT * FROM platos";
	$resultado=$mysqli->query($query);

	while ($plato = $resultado->fetch_array(MYSQLI_BOTH)){

	 	$tiempo=conversorTiempos($plato['tiempo']);
	 	$id=$plato['id_plato'];

		echo "<div class='reci'><button class='plato otro'>".$plato['nombre']."<br>".$tiempo."</button>
		<a href='modificar.php?id=".$id."'><button class='cbttn'>Modificar</button></a>
		<a href='borrar.php?id=".$id."'><button class='cbttn cerrar'>Borrar</button></a>
		</div>";
		
	}

}
?>

</div>
<?php 
	if(isset($_GET['mesa'])){
	?>
	<div class="campo">
	<button class='cbttn cerrar' onclick="cerrar(<?php echo $mesa?>)">Cerrar</button>
	<button class="cbttn" onclick="crearPlato2()">Crear Plato</button>
	</div>
	<?php
	}else{
		?>
		<div class="campo">
		<button class='cbttn cerrar' onclick="cer()">Cerrar</button>
		<button class="cbttn" onclick="crearPlato2()">Crear Plato</button>
		</div>
		<?php
	}
	?>
	</div>
	</body>
	




<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<body onresize="centrar()" onload="inicio()">
<?php
include('bd.php');
if(isset($_POST['nombre'])){
	
		$nombre=$_POST['nombre'];
		$horas= (int) $_POST['horas'];
		$minutos= (int) $_POST['minutos']+($horas*60);
		$segundos= (int) $_POST['segundos']+($minutos*60);
		
		echo "Nombre: ".$nombre."<br>Segundos: ".$segundos;

		$query1="INSERT INTO `platos`(`nombre`, `tiempo`) VALUES ('$nombre',$segundos)";
		$mysqli->query($query1);
		if(isset($_GET['mesa'])){
			$mesa=$_GET['mesa'];
			header("Location: productos.php?mesa=$mesa");
		}else{
			header("Location: productos.php");
		}
		
	}
	?>
<div id="contenedor" class="campo">
	<h4>--------Crear Plato--------</h4>
	<form method="POST">
		Nombre Del Plato:<input type="text" name="nombre"><br>
		Tiempo:<input type="text" name="horas" size="2" value="00">:<input type="text" name="minutos" size="2" value="00">:<input type="text" name="segundos" size="2" value="00"><br>
		<button class="cbttn" type="submit">Crear</button>
	</form>
	<?php 
	if(isset($_GET['mesa'])){
	?>
	<button class='cbttn cerrar' onclick="cerrar(<?php echo $mesa?>)">Cerrar</button>
	<?php
	}else{
		?>
		<button class='cbttn cerrar' onclick="cer()">Cerrar</button>
		<?php
	}
	?>
	</div>
	<body>
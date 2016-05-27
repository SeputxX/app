<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<body onresize="centrar()" onload="inicio()"><?php
include('bd.php');
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
	$query="INSERT INTO mesas(`nombre`) VALUES ('$nombre')";

	$result=$mysqli->query($query);
	
	header("Location: mesas.php");
}
?>
<div id="contenedor" class="campo">
	<h4>Crear Mesa</h4>
	<form method="POST">
		Nombre De La Mesa<input type="text" name="nombre"><br>
		<button class="cbttn" type="submit">Crear</button>
	</form>
	<button class='cbttn cerrar' onclick="cer()">Cerrar</button>
</div>

</body>

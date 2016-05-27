<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<body onresize="centrar()" onload="inicio()">
<div id="contenedor">
<?php 


include("bd.php");

$query="SELECT * FROM `mesas`";
$resultado=$mysqli->query($query);
echo "<div class='container'>";
while ($mesa = $resultado->fetch_array(MYSQLI_BOTH)){

	
	echo	"<div class='control'>
				<button id='".$mesa['idmesa']."' class='plato otro'>".$mesa['nombre']."</button><br>
				<a href='modificarMesa.php?id=".$mesa['idmesa']."'><button class='cbttn'>Modificar</button></a>
			 	<a href='borrarMesa.php?id=".$mesa['idmesa']."'><button class='cbttn cerrar'>Borrar</button></a>
			 </div>
			 ";
	
}
echo "</div>";


 ?>
 <div class="campo">
 <button class="cbttn" onclick="crearMesa2()">Crear Mesa</button>
 <button class='cbttn cerrar' onclick="cer()">Cerrar</button>
 </div>
 </div>
 </body>
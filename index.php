<head>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
</head>
<body onresize="posicionar()" onload="posicionar()">
	<?php 
		include("utilidades/bd.php");
		$query="SELECT count(*) as cantidad FROM `mesas`";
		$resultado=$mysqli->query($query);
		$cantidad = $resultado->fetch_array(MYSQLI_BOTH)['cantidad'];

		$query="SELECT * FROM `mesas`";
		$resultado=$mysqli->query($query);
		
		echo "<div id='activas' class='activas'>";

		$idmesa=1;

		while ($mesa = $resultado->fetch_array(MYSQLI_BOTH)){

			echo "<div class='mesao' id='m".$idmesa."'><a class='exit' onclick='exit(".$idmesa.")'></a><button id='".$idmesa."'  class='bttn' onclick='verPlatos(".$idmesa.")'>".$mesa['nombre']."</button><div id='crono".$idmesa."' class='crono'></div></div>";
		$idmesa++;
		} 
		echo "</div>";
	?>
	<div id="controles" class="controles" style='display:none;'>
			<button class="cbttn" onclick="verPro()">Ver Platos</button>
			<button class="cbttn" onclick="crearPlato()">Crear Plato</button>
			<button class="cbttn" onclick="window.location.reload();">Recargar Página</button>
			<!-- <button class="cbttn" onclick="launchFullScreen(document.documentElement)">Pantalla completa</button> -->
			<button class="cbttn" onclick="crearMesa()">Crear Mesa</button>
			<button class="cbttn" onclick="verMesas()">Ver mesas</button>
			<button class='cbttn cerrar' onclick="cer()">Cerrar</button>
			<audio id="player" src="sound/alarma.mp3"> </audio> 
	</div>
	<?php
		echo "</div><div id='abajo' class='mesas' style='display:none;'>";
		$query="SELECT * FROM `mesas`";
		$resultado=$mysqli->query($query);
		$idmesa=1;
		while ($mesa = $resultado->fetch_array(MYSQLI_BOTH)){
			echo "<div class='nombre'><button id='".$idmesa."'  class='plato' onclick='verPlatos(".$idmesa.")'>".$mesa['nombre']."</button></div>";
		$idmesa++;
		}
		echo "</div>";
	 ?>
</body>




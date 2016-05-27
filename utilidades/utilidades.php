<?php 
  function conversorTiempos($tiempo_en_segundos) {
	$horas = floor($tiempo_en_segundos / 3600);
	$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
	$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
 
	return $horas . ':' . $minutos . ":" . $segundos;
}
 ?>
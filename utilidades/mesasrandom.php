<?php 

include('bd.php');


for($i=0;$i<25;$i++){
	$random=rand(0, 100)." mesa ".rand(0, 100);
	$query="INSERT INTO mesas(`nombre`) VALUES ('$random')";
	$mysqli->query($query);
}

 ?>
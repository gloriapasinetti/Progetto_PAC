<?php
include("connessione.php");
$corso=$_GET["id"];
$dis=$_GET["dis"];
	$sql="INSERT INTO partecipare (id_corso, id_disoccupato) VALUES (". $corso . "," . $dis . ")"; 
	mysqli_query($conn, $sql);
	echo $corso;
	echo $dis;
	header("location:https://www.paypal.com/it/signin/");
?>
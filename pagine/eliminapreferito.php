<?php
include("connessione.php");
session_start();
if($_SESSION["tipo"]=="a"){
	$idloggato=$_GET["loggato"];
	$idpreferito=$_GET["aggiungere"];
	$sql="DELETE FROM Preferitiaziende WHERE id_azienda='" . $idloggato . "' and id_disoccupato='" . $idpreferito . "'";
	mysqli_query($conn, $sql);
	header("location: " . $_SERVER['HTTP_REFERER']);
}
elseif($_SESSION["tipo"]=="d"){
	$idloggato=$_GET["loggato"];
	$idpreferito=$_GET["aggiungere"];
	$sql="DELETE FROM Preferiti WHERE id_disoccupato='" . $idloggato . "' and id_azienda='" . $idpreferito . "'";
	mysqli_query($conn, $sql);
	header("location: " . $_SERVER['HTTP_REFERER']);
}

?>
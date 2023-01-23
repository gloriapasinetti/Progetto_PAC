<?php
include("connessione.php");
session_start();
if($_SESSION["tipo"]=="a"){
	$idloggato=$_GET["loggato"];
	$idpreferito=$_GET["aggiungere"];
	$sql="INSERT INTO Preferitiaziende (id_disoccupato, id_azienda) VALUES ('" . $idpreferito . "','" . $idloggato . "')";
	mysqli_query($conn, $sql);
	header("location: " . $_SERVER['HTTP_REFERER']);
}
elseif($_SESSION["tipo"]=="d"){
	$idloggato=$_GET["loggato"];
	$idpreferito=$_GET["aggiungere"];
	$sql="INSERT INTO Preferiti (id_disoccupato, id_azienda) VALUES ('" . $idloggato . "','" . $idpreferito . "')";
	mysqli_query($conn, $sql);
	header("location: " . $_SERVER['HTTP_REFERER']);
}
?>
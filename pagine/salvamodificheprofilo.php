<?php
include("connessione.php");
session_start();
$id=$_SESSION["id"];
if ($_SESSION["tipo"]=="a"){
	$denom=$_POST["denominazione"];
	$nazione=$_POST["nazione"];
	$provincia=$_POST["cmbProvincia"];
	$comune=$_POST["cmbCitta"];
	$cap=$_POST["cap"];
	$email=$_POST["email"];
	$foto=$_POST["file1"];
	$settore=$_POST["cmbSettore"];
	mysqli_set_charset($conn,"utf8");
	$sql="UPDATE aziende SET denominazione='" . $denom . "', nazione='" . $nazione . "', provincia='" . $provincia . "', comune='" . $comune . "', cap='" . $cap . "', email='" . $email . "', settore='" . $settore . "', foto='" . $foto . "' WHERE id_azienda='" . $id . "'";
	$ris=mysqli_query($conn,$sql);
	header("location: mioprofilo.php?modifica=1");
}
elseif($_SESSION["tipo"]=="d"){
	$nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
	$nazione=$_POST["nazione"];
	$provincia=$_POST["cmbProvincia"];
	$comune=$_POST["cmbCitta"];
	$cap=$_POST["cap"];
	$foto=$_POST["file1"];
	$email=$_POST["email"];
	mysqli_set_charset($conn,"utf8");
	$sql="UPDATE disoccupati SET nome='" . $nome . "', cognome='" . $cognome . "', nazione='" . $nazione . "', provincia='" . $provincia . "', comune='" . $comune . "', cap='" . $cap . "', email='" . $email . "', foto='" . $foto . "' WHERE id_disoccupato='" . $id . "'";
	$ris=mysqli_query($conn,$sql);
	header("location: mioprofilo.php?modifica= 1");
}
?>
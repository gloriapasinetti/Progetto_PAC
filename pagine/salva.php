<?php
include("connessione.php");
if ($_POST["tipo"]=="d"){
	$nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
	$nazione=$_POST["nazione"];
	$provincia=$_POST["cmbProvincia"];
	$comune=$_POST["cmbCitta"];
	$cap=$_POST["cap"];
	$email=$_POST["email"];
	$password=$_POST["pw1"];
	$file=$_POST["file1"];
	mysqli_set_charset($conn,"utf8");
	$sql="insert into disoccupati(nome,cognome,nazione,provincia,comune,cap,email,password,foto) values ('" . $nome . "','" . $cognome . "','" . $nazione . "','" . $provincia . "','" . $comune . "','" . $cap . "','" . $email . "','" . $password . "',' " . $file . "')";
	$ris=mysqli_query($conn,$sql);
	header("location: registrazione.php?avvenuto=1");
}
else if ($_POST["tipo"]=="a"){
	$denominazione=$_POST["denominazione"];
	$provincia=$_POST["cmbProvincia"];
	$comune=$_POST["cmbCitta"];
	$nazione=$_POST["nazione"];
	$cap=$_POST["cap"];
	$email=$_POST["email"];
	$settore=$_POST["cmbSettore"];
	$password=$_POST["pw1"];
	$file=$_POST["file1"];
	mysqli_set_charset($conn,"utf8");
	$sql="insert into aziende(denominazione,provincia,comune,nazione,cap,email,id_settore,password,foto) values ('" . $denominazione . "','" . $provincia . "','" . $comune . "','" . $nazione . "','" . $cap . "','" . $email . "'," . $settore . ",'" . $password . "',' " . $file . "')";
	$ris=mysqli_query($conn,$sql);
	header("location: registrazione.php?avvenuto=1");
}



?>
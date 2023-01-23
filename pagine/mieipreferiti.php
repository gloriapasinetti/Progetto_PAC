<html>
<head>
<link href = "css/home.css" rel="stylesheet" type = "text/css" />
<meta charset = "UTF-8"/>
<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand');
</style>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
</head>
<body>
<?php ob_start(); ?>
<?php
include("intestazione2.php");
include("connessione.php");
?>
<main>
<h1 style='text-align:center;'>I miei preferiti</h2>
<?php
	$id=$_SESSION['id'];
if ($_SESSION['tipo']=='a'){
	$sql="SELECT d.id_disoccupato, nome, cognome, nazione, provincia, comune, cap, foto, email FROM disoccupati as d, preferitiaziende as p WHERE d.id_disoccupato=p.id_disoccupato and id_azienda='" . $id . "'";
	mysqli_set_charset($conn,"utf8");
	$ris=mysqli_query($conn,$sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);

echo "<div id='rigautentefiltro'>
<div id='fotoutente'>";
echo "<a href = 'profilo.php?id=" . $riga['id_disoccupato'] . "&tipo=d'><img src='immagini/" . $riga["foto"] . "' width:'90' height:'90'></a></div>
<div id='infoutente'>
Nome: " . $riga["nome"] . "</br>
Cognome: " . $riga["cognome"] . "</br>
Nazione: " . $riga["nazione"] . "</br>
Provincia: " . $prov["nome_provincia"] . "</br>
Comune: " . $comune["comune"] . "</br></div><div id='cuore'>";

if(isset($_SESSION["id"]) and $_SESSION["tipo"]=="a"){
$sqllll="SELECT count(*) as conteggio FROM preferiti where id_azienda='" . $_SESSION["id"] . "' and id_disoccupato='" . $riga['id_disoccupato'] . "'";
mysqli_set_charset($conn,"utf8");
$risultato=mysqli_query($conn, $sqllll);
$contpreferiti=mysqli_fetch_array($risultato);
if($contpreferiti["conteggio"]==0){
		echo "<a href='aggiungipreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_disoccupato'] . "' onclick='cambiaImmagine(". $riga['id_disoccupato'] . ")'><img id='cuoreimm" . $riga['id_disoccupato'] . "' src='immagini/cuore.png' ></a>
		<a href='eliminapreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_disoccupato'] . "' onclick='cambiaImmagine(". $riga['id_disoccupato'] . ")'><img id='cuoreimm2" . $riga['id_disoccupato'] . "' src='immagini/cuorerosso.png' style='visibility:hidden;'></a>";}
	else{
		echo "<a href='eliminapreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_disoccupato'] . "' onclick='cambiaImmagine(". $riga['id_disoccupato'] . ")'><img id='cuoreimm2" . $riga['id_disoccupato'] . "' src='immagini/cuorerosso.png'></a>
		<a href='aggiungipreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_disoccupato'] . "' onclick='cambiaImmagine(". $riga['id_disoccupato'] . ")'><img id='cuoreimm" . $riga['id_disoccupato'] . "' src='immagini/cuore.png' style='visibility:hidden;'></a>";}
}
else{
	echo "<img src='immagini/cuore.png'>";
}

echo "</div>
</div>";}
	
}
elseif($_SESSION['tipo']=='d'){
	$sql="SELECT a.id_azienda, denominazione, nazione, provincia, comune, cap, foto, email, nome FROM aziende as a, preferiti as p, settore as s WHERE a.id_azienda=p.id_azienda and s.id_settore=a.id_settore and p.id_disoccupato='" . $id . "'";
	$ris=mysqli_query($conn,$sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);

echo "<div id='rigautentefiltro'>
<div id='fotoutente'>";
echo "<a href = 'profilo.php?id=" . $riga['id_azienda'] . "&tipo=a'><img src='immagini/" . $riga["foto"] . "' width:'90' height:'90'></a></div>
<div id='infoutente'>
Denominazione: " . $riga["denominazione"] . "</br>
Nazione: " . $riga["nazione"] . "</br>
Provincia: " . $prov["nome_provincia"] . "</br>
Comune: " . $comune["comune"] . "</br>
Settore: " . $riga["nome"] . "</br></div><div id='cuore'>";

if(isset($_SESSION["id"])){
$sqllll="SELECT count(*) as conteggio FROM preferiti where id_azienda='" . $riga['id_azienda'] . "' and id_disoccupato='" .$_SESSION["id"] . "'";
$risultato=mysqli_query($conn, $sqllll);
$contpreferiti=mysqli_fetch_array($risultato);
if($contpreferiti["conteggio"]==0){
		echo "<a href='aggiungipreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_azienda'] . "' onclick='cambiaImmagine(". $riga['id_azienda'] . ")'><img id='cuoreimm" . $riga['id_azienda'] . "' src='immagini/cuore.png' ></a>
		<a href='eliminapreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_azienda'] . "' onclick='cambiaImmagine(". $riga['id_azienda'] . ")'><img id='cuoreimm2" . $riga['id_azienda'] . "' src='immagini/cuorerosso.png' style='visibility:hidden;'></a>";}
	else{
		echo "<a href='eliminapreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_azienda'] . "' onclick='cambiaImmagine(". $riga['id_azienda'] . ")'><img id='cuoreimm2" . $riga['id_azienda'] . "' src='immagini/cuorerosso.png'></a>
		<a href='aggiungipreferito.php?loggato=" . $_SESSION["id"] . "&aggiungere=" . $riga['id_azienda'] . "' onclick='cambiaImmagine(". $riga['id_azienda'] . ")'><img id='cuoreimm" . $riga['id_azienda'] . "' src='immagini/cuore.png' style='visibility:hidden;'></a>";}
}
else{
	echo "<img src='immagini/cuore.png'>";
}

echo "</div></div>";
}
}
?>
</main>
</body>
</html>
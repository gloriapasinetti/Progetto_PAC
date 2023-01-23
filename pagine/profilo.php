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
<!-- End WOWSlider.com HEAD section -->
</head>
<body id="body" style='height:110%;'>
<?php
include("connessione.php");
include("intestazione2.php");
?>
<main>

<?php
if ($_GET["tipo"] == 'd'){
	mysqli_set_charset($conn,"utf8");
		$sql="select nome, cognome, nazione, provincia, comune, email, via, telefono, descrizione, cap, foto from disoccupati where id_disoccupato =" . $_GET["id"];
	$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune, mappa from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);
echo "<div> <h1><b>" . $riga["nome"] . " " . $riga["cognome"] . "</b></h1></div>";
echo "<div id='contenitoreprofilo'>
<div><div id='fotoutente3'><img src='immagini/" . $riga["foto"] . "' width:'300' height:'300'></a></div>
<div id='infoutente3'>
<span><b>Nome: </b>" . $riga["nome"] . "</span></br>
<span><b>Cognome: </b>" . $riga["cognome"] . "</span></br>
<span><b>Nazione: </b>" . $riga["nazione"] . "</span></br>
<span><b>Provincia: </b>" . $prov["nome_provincia"] . "</span></br>
<span><b>Comune: </b>" . $comune["comune"] . "</span></br>
<span><b>CAP: </b>" . $riga["cap"] . "</span></br>
<span><b>Via: </b>" . $riga["via"] . "</span></br>
<span><b>Telefono: </b>" . $riga["telefono"] . "</span></br>
<span><b>Email: </b>" . $riga["email"] . "</span></br></div></div></br></br></br>
<div><span style='float:left;width:57%;margin-top:60px;line-height:150%;text-align:justify;'><b>Descrizione:</b> " . $riga["descrizione"] . "</span></br>";
echo "<iframe id='mappa' src=" . $comune["mappa"] . "></iframe></div></div>";}}
elseif($_GET["tipo"] == 'a'){
	mysqli_set_charset($conn,"utf8");
	$sql="select a.id_azienda, denominazione, nazione, provincia, comune, cap, email, nome, via, telefono, descrizione, foto from aziende as a, settore as s where a.id_settore = s.id_settore and a.id_azienda =" . $_GET["id"];
	$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune, mappa from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);
echo "<div> <h1><b>" . $riga["denominazione"] . "</b></h1></div>";
echo "<div id='contenitoreprofilo'>
<div><div id='fotoutente3'><img src='immagini/" . $riga["foto"] . "' width:'300' height:'300'></a></div>
<div id='infoutente3'>
<span><b>Nome: </b>" . $riga["denominazione"] . "</span></br>
<span><b>Nazione: </b>" . $riga["nazione"] . "</span></br>
<span><b>Provincia: </b>" . $prov["nome_provincia"] . "</span></br>
<span><b>Comune: </b>" . $comune["comune"] . "</span></br>
<span><b>CAP: </b>" . $riga["cap"] . "</span></br>
<span><b>Via: </b>" . $riga["via"] . "</span></br>
<span><b>Telefono: </b>" . $riga["telefono"] . "</span></br>
<span><b>Email: </b>" . $riga["email"] . "</span></br></div></div></br></br></br>
<div><span style='float:left;width:57%;margin-top:60px;line-height:150%;text-align:justify;'><b>Descrizione:</b> " . $riga["descrizione"] . "</span></br>";
echo "<iframe id='mappa' src=" . $comune["mappa"] . "></iframe></div></div>";}}

?>
</main>







<?php
include("footer.html");
?>
</body>
</html>

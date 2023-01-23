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
<script>
function cambiaImmagine(dis){
		a="cuoreimm"+dis;
		b="cuoreimm2"+dis;
		if(document.getElementById(a).style.visibility == "visible"){
			document.getElementById(a).style.visibility = "hidden";
			document.getElementById(b).style.visibility = "visible";
		}
		else{
			document.getElementById(b).style.visibility = "hidden";
			document.getElementById(a).style.visibility = "visible";
		}
	
}
</script>
</head>
<body>
<?php ob_start(); ?>
<?php
include("intestazione2.php");
include("connessione.php");
?>		
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get" style='background-color:white;'>
<input type="text" name="cerca" id="search" placeholder="Cerca sul sito" value="<?php if (isset($_GET["cerca"])){echo $_GET["cerca"];} ?>">
<input type="submit" class="button" value="Cerca"><main id='mainad'></br>
</form>
<script>
$( ".button" ).click(function() {
  $( "main" ).remove();
});
</script>
<?php
	$record_pag=5;
	if(!isset($_GET["cerca"])){
		$cerca="";}
	else{$cerca=$_GET["cerca"];}
	
	
		$sqll="select count(*) as cont_record from disoccupati where nome like '%" .$cerca  ."%' or cognome like '%" .$cerca  ."%'";
	
	
	$riss=mysqli_query($conn,$sqll);
	$riga=mysqli_fetch_array($riss);
	if ($riga["cont_record"] != 0){
		
		$numero = $riga["cont_record"];
	}
	else {
		$sqlll="select count(*) as cont_record from disoccupati"; 
	$risss=mysqli_query($conn,$sqlll);
	$rigaa=mysqli_fetch_array($risss);
		$numero = $rigaa["cont_record"];
		
	}
	$num_pagine=ceil($numero/$record_pag);
	if(isset($_GET["pag_corrente"]))
		{$pag_corrente=$_GET["pag_corrente"];}
	else
		{$pag_corrente=1;}	
	$inizio=($pag_corrente-1)*$record_pag;
	mysqli_set_charset($conn,"utf8");
		$sql="select id_disoccupato, nome, cognome, nazione, provincia, comune, foto from disoccupati where nome like '%" .$cerca  ."%' or cognome like '%" .$cerca  ."%'  LIMIT $inizio, $record_pag";
	
		$ris = mysqli_query($conn, $sql);
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
$sqllll="SELECT count(*) as conteggio FROM preferitiaziende where id_azienda='" . $_SESSION["id"] . "' and id_disoccupato='" . $riga['id_disoccupato'] . "'";
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
/*PAGINATORE*/
echo "<nav id='navad'><ul>";
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=1&cerca=$cerca'>|<</a></li>";
	/*-*/if ($pag_corrente-2>0){
				$menouno=$pag_corrente-1;
				echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$menouno&cerca=$cerca'>...</a></li>";}
	
	for($pag=$pag_corrente-1;$pag<=$pag_corrente+1;$pag++){
		if ($pag!=$pag_corrente){
				if ($pag<=$num_pagine && $pag!=0){
				/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$pag&cerca=$cerca'>$pag</a></li>";}
			}
		else{
			echo $pag ;
		}
	}	
if ($pag_corrente<=$num_pagine-2){
	$piuuno=$pag_corrente+1;
	/*-*/echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$piuuno&cerca=$cerca'>...</a></li>";
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine&cerca=$cerca'>>|</a></li></ul></nav>";
}
else{
	echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine&cerca=$cerca'>>|</a></li></ul></nav>";
}

if(!isset($_SESSION["id"])){
	if (!isset($_GET["pippo"])){
	header("location:". $_SERVER["PHP_SELF"]."?pippo=1&#win");}?>
<a class="overlay" id="win"></a>
	<div class="popup">
	<form action = "login.php" method = "post" id = "login">
	<span id="titolo">Per accedere a questa pagina devi essere registrato</br></br>Inserisci qui le tue credenziali</span></br>
	<a id="errore">Credenziali errate</a></br>
	<span>E-mail:</span> <input type = "email" name = "email" ></br>
	<span>Password:</span> <input type = "password" name = "password" ></br>
	<input type = "submit" value = "Login" style="font-size:12pt;"></br></br></br>
	<span id="noaccount">Non hai un account?</span> <a href="registrazione.php"> Registrati </a>
<?php } ?>


</main>
</body>
</html>
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
<body style='height:1000px;'>
<?php ob_start(); ?>
<?php
include("intestazione2.php");
include("connessione.php");
?>		
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get" style='background-color:white;'>
<input type="text" name="cerca" id="search" placeholder="Cerca sul sito" value="<?php if (isset($_GET["cerca"])){echo $_GET["cerca"];} ?>">
<input type="submit" class="button" value="Cerca"><main id='mainad'></br>
</form>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get" style='float:left; margin-left:20px;'>

<input type="checkbox" name="meccanico" value="meccanico" <?php if(isset($_GET["meccanico"]) && $_GET["meccanico"] != ""){echo "checked";} ?>  >Meccanico</br>
<input type="checkbox" name="pulizia" value="pulizia" <?php if(isset($_GET["pulizia"]) && $_GET["pulizia"] != ""){echo "checked";} ?>>Pulizia</br>
<input type="checkbox" name="siderurgico" value="siderurgico" <?php if(isset($_GET["siderurgico"]) && $_GET["siderurgico"] != ""){echo "checked";} ?>>Siderurgico</br>
<input type="checkbox" name="ristorazione" value="ristorazione" <?php if(isset($_GET["ristorazione"]) && $_GET["ristorazione"] != ""){echo "checked";} ?> >Ristorazione</br>
<input type="checkbox" name="tessile" value="tessile" <?php if(isset($_GET["tessile"]) && $_GET["tessile"] != ""){echo "checked";} ?>>Tessile</br>
<input type="submit"  value="Filtra">
</form>
<div style='flaot:left;'>
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
	
	 if (isset($_GET['meccanico'])){
		$sql = "select id_settore from settore where nome='" . $_GET["meccanico"] . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$mec = $riga["id_settore"];
		echo "<script> document.getElementsByName('meccanico').checked = checked </script>";
		}
	else{ 
		$mec="";}

		if (isset($_GET['pulizia'])){
		$sql = "select id_settore from settore where nome='" . $_GET["pulizia"] . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$pul = $riga["id_settore"];
		}
	else{ 
		$pul="";}

		if (isset($_GET['siderurgico'])){
		$sql = "select id_settore from settore where nome='" . $_GET["siderurgico"] . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$sid = $riga["id_settore"];		

		}
	else{ 
		$sid="";}
	
	if (isset($_GET['ristorazione'])){
		$sql = "select id_settore from settore where nome='" . $_GET["ristorazione"] . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$rist = $riga["id_settore"];
		}
	else{ 
		$rist="";}
	
	if (isset($_GET['tessile'])){
		$sql = "select id_settore from settore where nome='" . $_GET["tessile"] . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$tes = $riga["id_settore"];
		}
	else{ 
		$tes="";}
	
	
	
		$sqll="select count(*) as cont_record from aziende where denominazione like '%" .$cerca  ."%' and (id_settore ='" . $mec ."' or id_settore ='" . $pul ."' or id_settore ='" . $tes ."' or id_settore ='" . $sid ."' or id_settore ='" . $rist ."' )";
	$riss=mysqli_query($conn,$sqll);
	$riga=mysqli_fetch_array($riss);
 	if ($riga["cont_record"] != 0){
		$numero = $riga["cont_record"];

	}
	else  {
		$sqlll="select count(*) as cont_record from aziende"; 
		
	$risss=mysqli_query($conn,$sqlll);
	$rigaa=mysqli_fetch_array($risss);
		$numero = $rigaa["cont_record"];
	}  

	//$numero = $riga["cont_record"];
	$num_pagine=ceil($numero/$record_pag);
	if(isset($_GET["pag_corrente"]))
		{$pag_corrente=$_GET["pag_corrente"];}
	else
		{$pag_corrente=1;}	
	$inizio=($pag_corrente-1)*$record_pag;
	mysqli_set_charset($conn,"utf8");
	if ($riga["cont_record"]==0){
		$sql="select id_azienda, denominazione, nazione, provincia, comune, cap, email, nome, foto from aziende as a, settore as s where a.id_settore = s.id_settore and denominazione like '%" . $cerca ."%'  LIMIT $inizio, $record_pag";

	}
	else{
		$sql="select id_azienda, denominazione, nazione, provincia, comune, cap, email, nome, foto from aziende as a, settore as s where a.id_settore = s.id_settore and denominazione like '%" . $cerca ."%' and (a.id_settore ='" . $mec ."'  or a.id_settore ='" . $pul ."'  or a.id_settore ='" . $tes ."'  or a.id_settore ='" . $sid ."'  or a.id_settore ='" . $rist ."' ) LIMIT $inizio, $record_pag";	}
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
echo "<a href = 'profilo.php?id=" . $riga['id_azienda'] . "&tipo=a'><img src='immagini/" . $riga["foto"] . "' width:'90' height:'90'></a></div>
<div id='infoutente'>
Denominazione: " . $riga["denominazione"] . "</br>
Nazione: " . $riga["nazione"] . "</br>
Provincia: " . $prov["nome_provincia"] . "</br>
Comune: " . $comune["comune"] . "</br>
Settore: " . $riga["nome"] . "</br></div><div id='cuore'>";

if(isset($_SESSION["id"]) and $_SESSION["tipo"]=="d"){
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

echo "</div>
</div>";}

/*PAGINATORE*/
echo "<nav id='navad'><ul>";
	
		
		if (isset($_GET['meccanico'])){
		$sql = "select nome from settore where id_settore='" . $mec . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$mec = $riga["nome"];
		}
	else{ 
		$mec="";}
	
	if (isset($_GET['pulizia'])){
		$sql = "select nome from settore where id_settore='" . $pul . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$pul = $riga["nome"];
		}
	else{ 
		$pul="";}
	
	if (isset($_GET['siderurgico'])){
		$sql = "select nome from settore where id_settore='" . $sid . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$sid = $riga["nome"];		

		}
	else{ 
		$sid="";}
	
	if (isset($_GET['ristorazione'])){
		$sql = "select nome from settore where id_settore='" . $rist . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$rist = $riga["nome"];
		}
	else{ 
		$rist="";}
	
	if (isset($_GET['tessile'])){
		$sql = "select nome from settore where id_settore='" . $mec . "'";
		$risss=mysqli_query($conn,$sql);
		$riga=mysqli_fetch_array($risss);
		$tes = $riga["nome"];
		}
	else{ 
		$tes="";}
		
		//PAGINATORE
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=1&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>|<</a></li>";
	/*-*/if ($pag_corrente-2>0){
				$menouno=$pag_corrente-1;
				echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$menouno&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>...</a></li>";}
	
	for($pag=$pag_corrente-1;$pag<=$pag_corrente+1;$pag++){
		if ($pag!=$pag_corrente){
				if ($pag<=$num_pagine && $pag!=0){
				/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$pag&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>$pag</a></li>";}
			}
		else{
			echo $pag ;
		}
	}	
if ($pag_corrente<=$num_pagine-2){
	$piuuno=$pag_corrente+1;
	/*-*/echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$piuuno&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>...</a></li>";
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>>|</a></li></ul></nav>";
}
else{
	echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine&cerca=$cerca&meccanico=$mec&pulizia=$pul&tessile=$tes&siderurgico=$sid&ristorazione=$rist'>>|</a></li></ul></nav>";
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
</div>
</main>

</body>
</html>
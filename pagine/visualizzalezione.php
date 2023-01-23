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
<body id="body">
<?php
include("connessione.php");
include("intestazione2.php");
?>
<main>
<div> <h2><b>Scegli il corso più adatto a te!</b></h2></div>
<div> <b>Le Lezioni on line ti permettono un facile accesso a materiale didattico direttamente da casa.</b> </div>
<?php
	$record_pag=2;

	
	
		

	
	
		$sqll="select count(*) as cont_record from corsi";
		$riss = mysqli_query($conn, $sqll);
		$rigaa= mysqli_fetch_array($riss);
	
	
		$numero = $rigaa["cont_record"];
	echo $numero;
	$num_pagine=ceil($numero/$record_pag);
	if(isset($_GET["pag_corrente"]))
		{$pag_corrente=$_GET["pag_corrente"];}
	else
		{$pag_corrente=1;}	
	$inizio=($pag_corrente-1)*$record_pag;
	mysqli_set_charset($conn,"utf8");
		$sql="select id_corso, nome, descrizione_breve from corsi LIMIT $inizio, $record_pag";
	
		$ris = mysqli_query($conn, $sql);
		while ($riga= mysqli_fetch_array($ris)){


echo "<div id='infocorsi'>
<div id='fotoutente'>";
echo "<a href = 'dettaglicorso.php?id=" . $riga['id_corso'] . "'><img src='immagini/uomoesempio.jpg'></a></div>
<div id='infoutente'></br>
Nome: " . $riga["nome"] . "</br></br>
Descrizione: " . $riga["descrizione_breve"] . "</br></div></div>";}

/*PAGINATORE*/
echo "<nav id='navad'><ul>";
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=1'>|<</a></li>";
	/*-*/if ($pag_corrente-2>0){
				$menouno=$pag_corrente-1;
				echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$menouno'>...</a></li>";}
	
	for($pag=$pag_corrente-1;$pag<=$pag_corrente+1;$pag++){
		if ($pag!=$pag_corrente){
				if ($pag<=$num_pagine && $pag!=0){
				/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$pag'>$pag</a></li>";}
			}
		else{
			echo $pag ;
		}
	}	
if ($pag_corrente<=$num_pagine-2){
	$piuuno=$pag_corrente+1;
	/*-*/echo "<li style='width:15px'><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$piuuno'>...</a></li>";
	/*-*/echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine&cerca=$cerca'>>|</a></li></ul></nav>";
}
else{
	echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?pag_corrente=$num_pagine'>>|</a></li></ul></nav>";
}
/*FINESTRA INIZIALE*/
if(!isset($_SESSION["id"])){
if(!isset($_GET["pippo"])){
header("location:". $_SERVER["PHP_SELF"]."?pippo=1&#win");}
</main>







<?php
include("footer.html");
?>
</body>
</html>

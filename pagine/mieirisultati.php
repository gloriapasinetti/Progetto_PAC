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
<body style = "height: 30%">
<?php ob_start(); ?>
<?php
include("intestazione2.php");
include("connessione.php");
?>		
<main>

<?php
	$sqll="select risultato from risultato_test where id_disoccupato='" . $_SESSION["id"] . "' and id_lezione='1' and id_corso='1'";
		$ris=mysqli_query($conn,$sqll);
	$punteggio=mysqli_fetch_array($ris);
	
	echo "<div id='lezioni'>Hai superato il test della lezione n° 1 del corso <b> 'Gestire un colloquio di lavoro' </b> con il <b>" . $punteggio["risultato"] . "%</b>!!" ;

	echo "</main>";
	include("footer.html");
	
?>
</body>
</html>
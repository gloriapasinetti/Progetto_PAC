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
<div> <h2><b>Chat</b></h2></div>

<?php
if (isset($_SESSION["id"]) && $_SESSION["tipo"] == 'd'){
	$id_utente = $_GET["id"];
	$sql="select id_aziendai, id_aziendar, id_disoccupatoi, id_disoccupator, messaggio from chat where (id_disoccupatoi=" . $_SESSION["id"] . " and id_aziendar=" . $id_utente . ") or (id_disoccupator =" . $_SESSION["id"] . " and id_aziendai =" . $id_utente . ")";
	$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		if($riga["id_disoccupator"]!=0){
			echo "Azienda: " . $riga["messaggio"] . ";</br>";
		}
		elseif($riga["id_disoccupatoi"]!=0){
			echo "Tu: " . $riga["messaggio"] . ";</br>";
		}
	}
	
}
elseif(isset($_SESSION["id"]) && $_SESSION["tipo"] == 'a'){
	$id_utente = $_GET["id"];
	$sql="select id_aziendai, id_aziendar, id_disoccupatoi, id_disoccupator, messaggio from chat where (id_aziendai=" . $_SESSION["id"] . " and id_disoccupator=" . $id_utente . ") or (id_aziendar =" . $_SESSION["id"] . " and id_disoccupatoi =" . $id_utente . ")";
	$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		if($riga["id_disoccupator"]!=0){
			echo "Tu: " . $riga["messaggio"] . ";</br>";
		}
		elseif($riga["id_disoccupatoi"]!=0){
			echo "Disoccupato: " . $riga["messaggio"] . ";</br>";
		}
	}
}
	?>
</main>
<?php
include("footer.html");
?>
</body>
</html>
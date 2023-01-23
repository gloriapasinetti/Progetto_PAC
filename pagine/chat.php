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


		 $sql = "select distinct id_aziendai from chat where id_disoccupator=" . $_SESSION["id"] . " and id_aziendai > 0 union select distinct id_aziendar from chat where  id_disoccupatoi=" . $_SESSION["id"] . " and id_aziendar > 0";
	$ris = mysqli_query($conn, $sql);
			$conteggio = mysqli_num_rows($ris);
	while ($rigaaa = mysqli_fetch_array($ris)){
	$sqll = "select denominazione, foto from aziende where id_azienda =" . $rigaaa["id_aziendai"] ;
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<a href = 'visualizzachat.php?id=" . $rigaaa["id_aziendai"] . "'><img src='immagini/" . $rigaa["foto"] . "' width:'90' height:'90'></a></div>
		<div id='infoutentechat' >
		</br></br>Denominazione: " . $rigaa["denominazione"] . "</br></div></div>";

		 
	 }

	}
	
	



}
if (isset($_SESSION["id"]) && $_SESSION["tipo"] == 'a'){


		 $sql = "select distinct id_disoccupatoi from chat where id_aziendar=" . $_SESSION["id"] . " and id_disoccupatoi > 0 union select distinct id_disoccupator from chat where  id_aziendai=" . $_SESSION["id"] . " and id_disoccupator > 0";
	$ris = mysqli_query($conn, $sql);
			$conteggio = mysqli_num_rows($ris);
	while ($rigaaa = mysqli_fetch_array($ris)){
	$sqll = "select nome, cognome, foto from disoccupati where id_disoccupato =" . $rigaaa["id_disoccupatoi"] ;
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<a href = 'visualizzachat.php?id=" . $rigaaa["id_disoccupatoi"] . "'><img src='immagini/" . $rigaa["foto"] . "' width:'90' height:'90'></a></div>
		<div id='infoutentechat' >
		</br></br>Nome: " . $rigaa["nome"] . "</br>
		Cognome: " . $rigaa["cognome"] . "</br></div></div>";

		 
	 }

	}
	
	



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
<?php
include("footer.html");
?>
</body>
</html>
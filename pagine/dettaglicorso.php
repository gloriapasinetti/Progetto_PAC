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
<body>
<?php
include("connessione.php");
include("intestazione2.php");
?>
<a class="overlay" id="win"></a>
	<div class="popup">
	<form action = "login.php" method = "post" id = "login">
	<span id="titolo">Per accedere a questa pagina devi essere registrato o essere un lavoratore</br></br>Inserisci qui le tue credenziali</span></br>
	<a id="errore">Credenziali errate</a></br>
	<span>E-mail:</span> <input type = "email" name = "email" ></br>
	<span>Password:</span> <input type = "password" name = "password" ></br>
	<input type = "submit" value = "Login" style="font-size:12pt;"></br></br></br>
	<span id="noaccount">Non hai un account?</span> <a href="registrazione.php"> Registrati </a></form></div>
<main>
<div> <h2><b>Il tuo incontro Ad Hoc!</b></h2></div>
<?php
mysqli_set_charset($conn,"utf8");

$sql="select id_corso, nome, descrizione, prezzo, durata, video from corsi where id_corso =" . $_GET["id"];
$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){

echo "<div id='contenitorecorso'>
<div id='videocorso'><video controls><source src='video/presentazionee.mp4' type='video/mp4'></video></a></div>
<div id='infocorso'></br>
<b>Nome</b>: " . $riga["nome"] . "</br></br>
<b>Descrizione</b>: " . $riga["descrizione"] . "</br></br>
<b>Prezzo</b>: " . $riga["prezzo"] . ",99</br></br>
<b>Durata</b>: " . $riga["durata"] . "</br></br>
</div></div></br>";
$corso=$riga["id_corso"];
}
if(isset($_SESSION["id"]) and $_SESSION["tipo"]=="d"){
	$sqllll="SELECT count(*) as conteggio FROM partecipare where id_corso='" . $corso . "' and id_disoccupato='" .$_SESSION["id"] . "'";
$risultato=mysqli_query($conn, $sqllll);
$contpreferiti=mysqli_fetch_array($risultato);
if($contpreferiti["conteggio"]==0){
	
echo "<a href='partecipare.php?id=" . $corso . "&dis=" . $_SESSION["id"] ."'><button id='bottoneiscriviti'> Iscriviti al corso </button></a>";}
else{
	echo "<button id='bottoneiscriviti'>Sei già iscritto a questo corso</button>";
}}
else{
	echo "<a href='" . $_SERVER["PHP_SELF"]."?pippo=1&#win'><button id='bottoneiscriviti'>Iscriviti al corso</button></a>";
}
?>
</main>
</body>
</html>
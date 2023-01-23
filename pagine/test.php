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
<main>
	<div> <h2><b>Il tuo test Ad Hoc!</b></h2></div>
	<div>Grazie a questo test scoprirai se hai appreso appieno la lezione 1!</div>
	
	<?php
	$sql="select count(*) as conteggio from risultato_test where id_disoccupato='" . $_SESSION["id"] . "' and id_lezione='1' and id_corso='1'";
	$ris=mysqli_query($conn,$sql);
	$conteggio=mysqli_fetch_array($ris);
	$sqll="select max(risultato) as massimo from risultato_test where id_disoccupato='" . $_SESSION["id"] . "' and id_lezione='1' and id_corso='1'";
	$riss=mysqli_query($conn,$sqll);
	$maxrisultato=mysqli_fetch_array($riss);
if($conteggio["conteggio"]>0 && $maxrisultato["massimo"]>70){
	echo "</br></br><div><b>Hai già superato questo test!</b></div>";
}
else{
	echo "<div id='domandetest'>";
		mysqli_set_charset($conn,"utf8");
if (isset($_SESSION['id']) && $_SESSION['tipo']=="a"){
	echo "<h2 Pagina riservata solamente a coloro che cercano lavoro</h2>";
	}
	else{
$sql1 = "SELECT count(*) as conteggio FROM test_lezione1";
$ris1 = mysqli_query($conn,$sql1);
$maxid=mysqli_fetch_array($ris1);
if (isset($_GET["contatore"])){
	$contatore = $_GET["contatore"];
}
else{
	$contatore = 0;
}
if (isset($_GET["numero"])){
$numero = $_GET["numero"]+1;}
else {
	$numero = 1;
}
$_SESSION["numero"] = $numero;
	if(($numero) <= ($maxid["conteggio"])){
		$sql = "select domanda, risposta1, risposta2 from test_lezione1 where id=" . $numero;
		$ris = mysqli_query($conn,$sql);
			while ($riga=mysqli_fetch_array($ris)){
				echo "<h3>" . $riga["domanda"] . "</h3>";
				$piuuno = $contatore + 1;
				
				echo "<a href = 'test.php?numero=" . $numero . "&contatore=$piuuno'><button class='pulsante'>" . $riga["risposta1"] . "</button></a></br>";
				echo "<a href = 'test.php?numero=" . $numero . "&contatore=$contatore'><button class='pulsante'>" . $riga["risposta2"] . "</button></a></br>";
			}
	}
	else{
	
	if ($contatore >= 7){
		$contatore = $contatore*10;
		echo "Hai superato il test. La tua percentuale è del: " . $contatore . "%";
			
	$sql = "insert into risultato_test(id_disoccupato, id_lezione, risultato) values('" . $_SESSION["id"] . "','1','" . $contatore . "')";
	$ris = mysqli_query($conn, $sql);;
	}
	else if ($contatore <= 7) {
		$contatore = $contatore*10;
	echo "Non hai superato il test. La tua percentuale è del: " . $contatore . "%";
	$sql = "insert into risultato_test(id_disoccupato, id_lezione, risultato) values('" . $_SESSION["id"] . "','1','" . $contatore . "')";+
	$ris = mysqli_query($conn, $sql);}}

	}
	?>
</div>
<?php
}
?>
</main>

<?php
include("footer.html");
?>

</body>
</html>
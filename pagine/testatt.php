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
 
	if (isset($_SESSION['id']) && $_SESSION['tipo']=="a"){
	echo "<h2 Pagina riservata solamente a coloro che cercano lavoro</h2>";
	}
	else{
?>
<main>
	<div> <h2><b>Il tuo test Ad Hoc!</b></h2></div>
	<div>Questo test attitudinale ti permetterà di trovare l'occupazione più adatta a te ed alle tue esigenze.</div>
	<div id="domandetest">
<?php
mysqli_set_charset($conn,"utf8");
if(isset($_SESSION["id"])){
$sql = "select count(*) as conteggio from testattitudinale where id_disoccupato =" . $_SESSION['id'][0];
$ris = mysqli_query($conn,$sql);
$controllo=mysqli_fetch_array($ris);
if ($controllo["conteggio"] == 1){
	echo "<h2> Il test può essere svolto una sola volta </h2>";
	}}
if (!isset($_SESSION["id"]) or $controllo["conteggio"] == 0 ) {
$sql1 = "SELECT count(*) as conteggio FROM domandetest";
$ris1 = mysqli_query($conn,$sql1);
$maxid=mysqli_fetch_array($ris1);
$numcas = rand(0,$maxid["conteggio"]);
if (isset($_GET["numero"])){
$numero = $_GET["numero"]+1;}
else {
	$numero = 1;
}
$_SESSION["numero"] = $numero;
	if(($numero) <= ($maxid["conteggio"])){
		$sql = "select domanda, risposta1, risposta2 from domandetest where iddomanda=" . $numero;
		$ris = mysqli_query($conn,$sql);
			while ($riga=mysqli_fetch_array($ris)){
				echo "<h3>" . $riga["domanda"] . "</h3>";
				echo "<a href = 'testatt.php?numero=" . $numero . "'><button class='pulsante'>" . $riga["risposta1"] . "</button></a></br>";
				echo "<a href = 'testatt.php?numero=" . $numero . "'><button class='pulsante'>" . $riga["risposta2"] . "</button></a></br>";
			}
	}
	else {
		echo "<div id='risultati_test'>";
		echo "<h2> I settori più indicati per te sono: </h2>";
			for ($k=0; $k < 2; $k++){
				for ($i=0; $i < 2; $i++){
					$sql2 = "SELECT count(*) as conteggio FROM settore";
					$ris2 = mysqli_query($conn,$sql2);
					$maxsettore=mysqli_fetch_array($ris2);
					$numcas = rand(1,$maxsettore["conteggio"]);
					$sql = "SELECT id_settore, nome FROM settore where id_settore =" . $numcas;
					$ris = mysqli_query($conn,$sql);
					$settore=mysqli_fetch_array($ris);

				}
			echo $settore['nome'] . "</br>";
			$x[$k] = $settore['id_settore'];
			$settore["nome"] == "";
			}
	if(isset($_SESSION["id"])){
		$sql3 = "insert into testattitudinale(id_disoccupato, livello, s_primascelta, s_secondascelta) values (" . $_SESSION['id'][0] . 
	", 'Base' , '" . $x[0] . "','" . $x[1] . "')";
	$ris3 = mysqli_query($conn,$sql3);
	}
	}		
	echo "</div>";

}
	}

	

?>
</div>
</main>

<?php
include("footer.html");
?>

</body>
</html>
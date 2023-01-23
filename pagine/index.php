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
function hoverIscriviti() {
	document.getElementById("stocazzo").src = "immagini/rombi_iscriviti_ingrandito.png";
}
function offIscriviti() {
document.getElementById("stocazzo").src = "immagini/rombi2.png";
}
function hoverProfilo() {
	document.getElementById("rombiprofilo").src = "immagini/rombi_profilo_ingrandito.png";
}
function offProfilo() {
document.getElementById("rombiprofilo").src = "immagini/rombi1.png";
}


function hoverTest1() {
	document.getElementById("stocazzo").src = "immagini/rombi_test_ingrandito.png";
}
function offTest1() {
document.getElementById("stocazzo").src = "immagini/rombi2.png";
}
function hoverTest2() {
	document.getElementById("rombiprofilo").src = "immagini/rombi_test_ingrandito2.png";
}
function offTest2() {
document.getElementById("rombiprofilo").src = "immagini/rombi1.png";
}



function hoverCorsi1() {
	document.getElementById("stocazzo").src = "immagini/rombi_corsi_ingrandito.png";
}
function offCorsi1() {
document.getElementById("stocazzo").src = "immagini/rombi2.png";
}
function hoverCorsi2() {
	document.getElementById("rombiprofilo").src = "immagini/rombi_corsi_ingrandito2.png";
}
function offCorsi2() {
document.getElementById("rombiprofilo").src = "immagini/rombi1.png";
}
</script>




</head>
<script type="text/javascript" src="https://nibirumail.com/docs/scripts/nibirumail.cookie.min.js"></script>
<body id="body">
<?php
include("intestazione1.php");
?>

<main id='mainindex'>

	<div> <h2><b>Il tuo incontro Ad Hoc!</b></h2></div>
	<div>Questa piattaforma ti permetterà di trovare l'occupazione più adatta a te ed alle tue esigenze.</div></br></br>
	<div><?php
			if(isset($_SESSION["id"])){
			echo "<img src='immagini/rombi1.png' id='rombiprofilo' usemap='#mapparombi2'></div>";}
			else{
				echo "<img id='stocazzo' src='immagini/rombi2.png' usemap='#mapparombi'></div>";}
				echo "<map name='mapparombi' id='mapparombi'>
						<area class='zoomm1' onmouseover='hoverIscriviti()' onMouseOut='offIscriviti()' shape='poly' coords='231,17,127,136,233,261,334,138' href='registrazione.php' target='_top' alt='Iscriviti'>
						<area class='zoomm2' onmouseover='hoverTest1()' onMouseOut='offTest1()' shape='poly' coords='113,147,6,267,112,395,219,269' href='testatt.php' target='_top' alt='TestAttitudinale'>
						<area class='zoomm3' onMouseOver='hoverCorsi1()' onMouseOut='offCorsi1()' shape='poly' coords='347,151,243,268,346,389,449,269' href='corsi.php' target='_top' alt='Corsi'></map>";
				echo "<map name='mapparombi2' id='mapparombi2'>
					<area class='zoomm1' onmouseover='hoverProfilo()' onMouseOut='offProfilo()' shape='poly' coords='231,17,127,136,233,261,334,138' href='mioprofilo.php' target='_top' alt='Profilo'>
					<area class='zoomm2' onmouseover='hoverTest2()' onMouseOut='offTest2()' shape='poly' coords='113,147,6,267,112,395,219,269' href='testatt.php' target='_top' alt='TestAttitudinale'>
					<area class='zoomm3' onMouseOver='hoverCorsi2()' onMouseOut='offCorsi2()' shape='poly' coords='347,151,243,268,346,389,449,269' href='corsi.php' target='_top' alt='Corsi'></map>";
			?>
</main>


	


<footer id="pie1">
<p>Cosa stai cercando?</p></br>
<div id="lavoratori">
<div class="contenitore">
		<div class="lavoratore">
			<div class="fronte">
				<a href="listadis.php"><img src="immagini/thumbnail_large12.png" >
			</div>
			<div class="retro">
				<a href="listadis.php"><img src="immagini/thumbnail_large13.png">
			</div>
			
		</div>
</div>
<div id="scritta">Lavoratori</div>
</div>

<div id="aziende">
<div class="contenitore">
		<div class="azienda">
			<div class="fronte">
				<a href="listaad.php"><img src="immagini/thumbnail_large8.png"></a>
			</div>
			<div class="retro">
				<a href="listaad.php"><img src="immagini/thumbnail_large14.png"></a>
			</div>
			
		</div>
</div>
<div id="scritta">Aziende</div>
</div>
</footer>

<?php
include("footer.html");
include("contenitorechat.php");
?>
</body>
</html>

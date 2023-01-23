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
echo "<main>";

	
	echo "<div id='videocorso' style = 'margin-top:80px'><video controls><source src='video/colloquio.mp4.mp4' type='video/mp4'></video></a></div>";
?>
<div style = "text-align:center; margin-top:60px"> Ad Hoc propone alcuni semplici consigli per coloro che si apprestano ad affrontarte un colloquio di lavoro. </br> 
Poche semplici accortezze possono permettervi di ottenere il lavoro che avete sempre sognato!!</br></br></br>
<b>Soprattutto ricorda di:</b></br></br>
1. Non arrivare in ritardo </br></br>
2. Non essere poco professionale </br></br>
3. non fornire informazioni false</br></br>
 <div>
<?php
	
	
	

	echo "</main>";
	include("footer.html");
	
?>
</body>
</html>
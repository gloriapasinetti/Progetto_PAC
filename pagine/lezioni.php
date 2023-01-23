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
<?php ob_start(); ?>
<?php
include("intestazione2.php");
include("connessione.php");
?>		
<main>

<?php

	
	
	echo "<div id='lezioni'><div id='lez1'><img src='immagini/colloquiolavoro.jpg'  ></br></br><a href='manuale.php'>Manuale</a></br></br><a href='videolezione.php'>Videolezione</a></br></br><a href='test.php'>Test</a></div>";
	echo "<div id='lez2'><img src='immagini/attesacolloquio.jpg'></br></br><a href=#>Manuale</a></br></br><a href=#>Videolezione</a></br></br><a href=#>Test</a></div>";
	echo "<div id='lez3'><img src='immagini/farsinotare.jpg'></br></br><a href=#>Manuale</a></br></br><a href=#>Videolezione</a></br></br><a href=#>Test</a></div></div>";

	
	
	
	echo "</main>";
	include("footer.html");
	
?>
</body>
</html>
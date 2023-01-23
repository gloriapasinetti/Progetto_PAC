<header>
		<a href="index.php"><img id="logo" src="immagini/logo.png"></a>
		<nav>
		<ul>
			<li><a href='index.php'>Home</a></li><li>
			<a>Consigli</a></li><li>
			<a href='normativa.php'>Normativa</a></li><li>
			<a href='faq.php'>FAQ</a></li><li>
			<a href='corsi.php'>Corsi</a></li><li>
			<a href='testatt.php'>Test</a></li><li>		
			<a href='listaad.php'>Aziende</a></li><li>		
			<a href='listadis.php'>Lavoratori</a></li><li>
			<?php
			session_start();
			if(isset($_SESSION["id"])){
				echo "<a href='esci.php'>Logout</a></li>";}
			else{
				echo "<a href='#win1' >Login</a></li>";}//per far aprire il popup del logout

			?>
			
		



		</ul>
	</nav>
<div id="wowslider-container1">
	<div class="ws_images">
	<ul>
		<li><img src="data1/images/Impegno.jpg" alt="Impegno" title="Impegno" id="wows1_0"/></li>
		<li><a href="http://wowslider.net"><img src="data1/images/Cooperazione.jpg" alt="wow slider" title="Coooperazione" id="wows1_1"/></a></li>
		<li><img src="data1/images/Passione.jpg" alt="Passione" title="Passione" id="wows1_2"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="Impegno"><span><img src="data1/tooltips/Impegno.jpg" alt="Impegno"/></span></a>
		<a href="#" title="Cooperazione"><span><img src="data1/tooltips/Cooperazione.jpg" alt="Cooperazione"/></span></a>
		<a href="#" title="Passione"><span><img src="data1/tooltips/Passione.jpg" alt="Passione"/></span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">css slider</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
	
	<?php
		if(isset($_GET["errore"])){
			$errore=$_GET["errore"];
			if($errore==1){
				echo "<style> .popup #errore {visibility:visible;}</style>";}
		}
	
	?>
	<a  class="overlay" id="win1"></a>

	<div class="popup">

	<form action = "login.php" method = "post" id = "login">

	<span id="titolo">Inserisci le tue credenziali</span></br>

	<a id="errore">Credenziali errate</a></br>

	<span>E-mail:</span> <input type = "email" name = "email"></br>
	<span>Password:</span> <input type = "password" name = "password"></br>
	<input type = "submit" value = "Login" style="font-size:12pt;"></br></br></br>

	<span id="noaccount">Non hai un account?</span> <a href="registrazione.php"> Registrati </a>

	<a class="close" title="Chiudere" href="<?php echo $_SERVER["PHP_SELF"]."?#close"; ?>" ></a>

</form>



</div>
</header>

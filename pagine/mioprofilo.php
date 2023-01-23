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
$(document).ready(function(){
$("#cmbProvincia").change(function(){
	$("#cmbCitta").empty()
});
$("#cmbProvincia").change(function(){
	var cmbProv = document.getElementById("cmbProvincia").value;
		$.ajax({
			url: 'restituisci.php',
			type: 'POST',
			data: "provincia=" + cmbProv,
			success: function(data) {
				var str = data;
				var res = str.split("|");
				var lung = res.length;	
				
				for(var j=0;j<lung;j++){
				var ress = res[j].split("-");				
				
					$("#cmbCitta").append("<option value='" + ress[0]+"'>" + ress[1]+"</option>")
				}
				document.getElementById("info").innerHTML = str;
			},
			error: function(){						
				document.getElementById("info").innerHTML = "Aggiornamento non eseguito. Verificare la connessione" ;
			}
		});
					
});


});
</script>	
</head>
<body>
<?php
include("intestazione2.php");
include("connessione.php");
?>
<main id="mainmieicorsi">
<?php
if(!isset($_SESSION["id"])){
if(!isset($_GET["pippo"])){
header("location:". $_SERVER["PHP_SELF"]."?pippo=1&#win");}
?>

<a class="overlay" id="win"></a>
	<div class="popup">
	<form action = "login.php" method = "post" id = "login">
	<span id="titolo">Per accedere a questa pagina devi essere registrato</br></br>Inserisci qui le tue credenziali</span></br>
	<a id="errore">Credenziali errate</a></br>
	<span>E-mail:</span> <input type = "email" name = "email" ></br>
	<span>Password:</span> <input type = "password" name = "password" ></br>
	<input type = "submit" value = "Login" style="font-size:12pt;"></br></br></br>
	<span id="noaccount">Non hai un account?</span> <a href="registrazione.php"> Registrati </a></form></div>

<?php 
}
else{

$id=$_SESSION['id'];
if ($_SESSION['tipo']=='a'){
	mysqli_set_charset($conn,"utf8");
$sql="select a.denominazione, nazione, provincia, comune, cap, email, s.nome, s.id_settore, foto from aziende as a, settore as s where a.id_settore=s.id_settore and id_azienda=" . $id;

$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);

	echo "
	<div>
	<form id='formmioprofilo' action='salvamodificheprofilo.php' method='post'>
	<div id='contenitoremioprofilo'>
	<h2>" . $riga["denominazione"] . "</h2>
	<div id='menuaprire'><div id='ciao'><img src='immagini/menu.gif'></br>
		<span id='vocimenu'><a href='mieipreferiti.php'>Preferiti</a></span></br>
		</div></div>
	<div id='fotoutente3'><img src='immagini/" . $riga["foto"] . "' width:'300' height:'300'></div>
	<div id='infoutente5'>
	<span>Denominazione:</span><input name='denominazione' type='text' value='" . $riga["denominazione"] . "'></br>
	<span>Nazione:</span><input name='nazione' type='text' value='" . $riga["nazione"] . "'></br>";
	
	//PROVINCE
	$sqltutteprovince="select * from province";
	$riss=mysqli_query($conn,$sqltutteprovince);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Provincia:</span><select id='cmbProvincia' name='cmbProvincia' required><option value='". $riga["provincia"] . "' selected>" . $prov["nome_provincia"] . " </option>";
	while($rigaa=mysqli_fetch_array($riss)){
		echo "<option value='" . $rigaa["id_provincia"] . "'>" . $rigaa["nome_provincia"] . "</option>";
	}
	echo "</select></br>";
	
	
	//COMUNE
	$sqlcomune="select * from comuni where prov='" . $riga["provincia"] . "'";
	$riss=mysqli_query($conn,$sqlcomune);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Comune:</span><select id='cmbCitta' name='cmbCitta'><option value='". $riga["comune"] . "' selected>" . $comune["comune"] . "</option>";
	while($rigaa=mysqli_fetch_array($riss)){
		echo "<option value='" . $rigaa["id"] . "'>" . $rigaa["comune"] . "</option>";
	}
	echo "</select></br>";
	
	
	echo "<span>CAP:</span><input name='cap' type='text' value='" . $riga["cap"] . "' required maxlength='5'></br>
	<span>Email:</span><input name='email' type='text' value='" . $riga["email"] . "'></br>";
	
	//SETTORE
	$sqltuttisettori="select * from settore";
	$riss=mysqli_query($conn,$sqltuttisettori);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Settore:</span><select name='cmbSettore' id='cmbSettore' required><option value='". $riga["id_settore"] . "' selected>" . $riga["nome"] . " </option>";
	while($rigaa=mysqli_fetch_array($riss)){
		echo "<option value='" . $rigaa["id_settore"] . "'>" . $rigaa["nome"] . "</option>";
	}
	echo "</select></br>";
	echo "<span>Foto: </span><input type='file' name='file1'></br>";
	echo "</div></br>";
	echo "<div><input type='submit' id='bottonesalvamodificaprofilo' value='SALVA MODIFICHE'></div></br>";
	if(isset($_GET["modifica"])){
		echo "<div><label id='modificacorretta'>Modifica avvenuta correttamente!</label></div>";
	}
	echo "</div></div></form>";}
}
elseif($_SESSION['tipo']=='d'){
	mysqli_set_charset($conn,"utf8");
$sql="select nome, cognome, nazione, provincia, comune, cap, email, foto from disoccupati where id_disoccupato=" . $id;

$ris = mysqli_query($conn, $sql);
	while($riga=mysqli_fetch_array($ris)){
		$sqll="select nome_provincia from province where id_provincia='" . $riga["provincia"] . "'";
			$riss = mysqli_query($conn, $sqll);
			$prov=mysqli_fetch_array($riss);
		$sqlll="select comune from comuni where id='" . $riga["comune"] . "'";
			$risss = mysqli_query($conn, $sqlll);
			$comune=mysqli_fetch_array($risss);

	echo "
	<form id='formmioprofilo' action='salvamodificheprofilo.php' method='post'>
	<div id='contenitoremioprofilo'>
	<h2>" . $riga["nome"] . " " . $riga["cognome"] . "</h2>
		<div id='menuaprire'><div id='ciao'><img src='immagini/menu.gif'></br>
		<span id='vocimenu'><a href='mieipreferiti.php'>Preferiti</a></span></br>
		<span id='vocimenu'><a href='mieicorsi.php'>Corsi</a></span></br>
		<span id='vocimenu'><a href='mieirisultati.php'>Risultati quiz</a></span></div></div>
		
		<div id='fotoutente3'><img src='immagini/" . $riga["foto"] . "' width:'300' height:'300'></div>
		<div id='infoutente5'>
			<span>Nome:</span><input name='nome' type='text' value='" . $riga["nome"] . "'></br>
			<span>Cognome:</span><input name='cognome' type='text' value='" . $riga["cognome"] . "'></br>
			<span>Nazione:</span><input name='nazione' type='text' value='" . $riga["nazione"] . "'></br>";
	
	//PROVINCE
	$sqltutteprovince="select * from province";
	$riss=mysqli_query($conn,$sqltutteprovince);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Provincia:</span><select id='cmbProvincia' name='cmbProvincia' required><option value='". $riga["provincia"] . "' selected>" . $prov["nome_provincia"] . " </option>";
	while($rigaa=mysqli_fetch_array($riss)){
		echo "<option value='" . $rigaa["id_provincia"] . "'>" . $rigaa["nome_provincia"] . "</option>";
	}
	echo "</select></br>";
	
	
	//COMUNE
	$sqlcomune="select * from comuni where prov='" . $riga["provincia"] . "'";
	$riss=mysqli_query($conn,$sqlcomune);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Comune:</span><select id='cmbCitta' name='cmbCitta'><option value='". $riga["comune"] . "' selected>" . $comune["comune"] . "</option>";
	while($rigaa=mysqli_fetch_array($riss)){
		echo "<option value='" . $rigaa["id"] . "'>" . $rigaa["comune"] . "</option>";
	}
	echo "</select></br>";
	
	
	echo "<span>CAP:</span><input name='cap' type='text' value='" . $riga["cap"] . "' required maxlength='5'></br>
	<span>Email:</span><input name='email' type='text' value='" . $riga["email"] . "'></br>";
	
	echo "<span>Foto: </span><input type='file' name='file1'></br>";
	echo "</div></br></br></br>";
	echo "<div><input type='submit' id='bottonesalvamodificaprofilo' value='SALVA MODIFICHE'></div></br>";
	if(isset($_GET["modifica"])){
		echo "<div><label id='modificacorretta'>Modifica avvenuta correttamente!</label></div></form>";
	}
	echo "</div></form>";
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
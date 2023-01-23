<html>
<link href = "css/home.css" rel="stylesheet" type = "text/css" />
<meta charset = "UTF-8"/>
<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand');
</style>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<script language="Javascript" type="text/javascript">
function Controlla(){
	if(document.getElementById("pw1").value==document.getElementById("pw2").value){
		return true;
	}
	else{
		alert("Le due password devono essere uguali");
		return false;
	}
	}
</script>
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
<body>

<?php
include("intestazione2.php");
if(isset($_GET["avvenuto"])){
	?>
	<main >
	<div> <h2><b>Benvenuto nella nostra piattaforma!</b></h2></div>
	<div>Questa piattaforma ti permetterà di trovare l'occupazione più adatta a te ed alle tue esigenze. </br></br>
	Inserisci le tue credenziali, inizia a navigare e trova la soluzione migliore per te</div>
	<?php
}
else{
?>
<main style = "height: 90%">
	<div> <h2><b>Il tuo incontro Ad Hoc!</b></h2></div>
	<div>Questa piattaforma ti permetterà di trovare l'occupazione più adatta a te ed alle tue esigenze. </br></br>
	Seleziona se vuoi registrarti come azienda o come disoccupato:</div>
	
<?php
include("connessione.php");
?>
</br>
<footer id="pie1" >

<div id="lavoratori">
<div class="contenitore">
		<div class="lavoratore">
			<div class="fronte">
				<a href = "<?php echo $_SERVER["PHP_SELF"] ?>?tipo=d" ><img src="immagini/thumbnail_large12.png"></a>
			</div>
			<div class="retro">
				<a href = "<?php echo $_SERVER["PHP_SELF"] ?>?tipo=d" ><img src="immagini/thumbnail_large13.png"></a>
			</div>
			
		</div>
</div>
<div id="scritta">Lavoratori</div>
</div>

<div id="aziende">
<div class="contenitore">
		<div class="azienda">
			<div class="fronte">
			<a href = "<?php echo $_SERVER["PHP_SELF"] ?>?tipo=a" ><img src="immagini/thumbnail_large8.png" > </a>
			</div>
			<div class="retro">
			<a href = "<?php echo $_SERVER["PHP_SELF"] ?>?tipo=a" ><img src="immagini/thumbnail_large14.png" ></a>
			</div>
			
		</div>
</div>
<div id="scritta">Aziende</div>
</div>
</footer>


<?php
//disoccupati
if(isset($_GET["tipo"]) && $_GET["tipo"]=='d'){
?>
<style>
#lavoratori{
	background-color: #c0c0c0;
}
#aziende{
	background-color:trasparent;
}
.formregistrazionea{
	visibility:hidden;
}
</style>
<form action = "salva.php" method = "post" class="formregistrazioned" onsubmit="return Controlla();">
<input type="text" name="tipo" value="d" style="visibility:hidden;"></br>
<span>Nome:</span><input type= "text" name="nome" required  /></br>
<span>Cognome:</span><input type= "text" name="cognome" required  /></br>
<span>Nazione:</span><input type= "text" name="nazione"  required  /></br>
<?php
	include("connessione.php");
	$sql="select * from province";
	$ris=mysqli_query($conn,$sql);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Provincia:</span><select id='cmbProvincia' name='cmbProvincia' required><option value='' selected> </option>";
	while($riga=mysqli_fetch_array($ris)){
		echo "<option value='" . $riga["id_provincia"] . "'>" . $riga["nome_provincia"] . "</option>";
	}
	echo "</select></br>";
?>

	<span>Comune:</span><select id="cmbCitta" name="cmbCitta"><option selected>Seleziona provincia</option></select></br>
<span>CAP:</span><input type= "text" name="cap"  required maxlength="5" /></br>
<span>Via:</span><input type= "text" name="via"  required/></br>
<span>Telefono:</span><input type= "text" name="telefono"  required/></br>
<span>Email:</span><input type= "email" name="email" required  /></br>
<span>Descrizione:</span></br>
<textarea name="descrizione" cols="30" rows="3" style='width:400px;margin-left:5px;'></textarea></br>
<?php
include("password.html");
echo "</br></br><span>File: </span><input type='file' name='file1'></br>";
?>
</br></br><input type= "submit" method="post"  value="ISCRIVITI" style="font-size:11pt;margin-left:30%;"/>
</form>

<?php
}
//aziende
else if(isset($_GET["tipo"]) && $_GET["tipo"]=='a'){
?>
<style>
#aziende{
	background-color:#c0c0c0;
}
#lavoratori{
	background-color:trasparent;
}
.formregistrazioned{
	visibility:hidden;
}

</style>
<form action = "salva.php" method = "post" class="formregistrazionea" onsubmit="return Controlla()">
	<input type="text" name="tipo" value="a" style="visibility:hidden;"></br>
	<span>Denominazione:</span><input type= "text" name="denominazione" required  /></br>
	<span>Nazione:</span><input type= "text" name="nazione"  required  /></br>
<?php
	include("connessione.php");
	$sql="select * from province";
	$ris=mysqli_query($conn,$sql);
	mysqli_set_charset($conn,"utf8");
	echo "<span>Provincia:</span><select id='cmbProvincia' name='cmbProvincia' required ><option value='' selected> </option>";
	while($riga=mysqli_fetch_array($ris)){
		echo "<option value='" . $riga["id_provincia"] . "'>" . $riga["nome_provincia"] . "</option>";
	}
	echo "</select></br>";
?>

	<span>Comune:</span><select id="cmbCitta" name="cmbCitta"><option selected>Seleziona provincia</option></select></br>
	<span>CAP:</span><input type= "text" name="cap"  required maxlength="5" /></br>
	<span>Email:</span><input type= "email" name="email" required  /></br>
	
<?php
mysqli_set_charset($conn,"utf8");
	$sql="select * from settore";
	$ris=mysqli_query($conn,$sql);
	echo "<span>Settore:</span><select name='cmbSettore' id='cmbSettore' required ><option value='' selected> </option>";
	while($riga=mysqli_fetch_array($ris)){
		echo "<option value=" . $riga["id_settore"] . ">" . $riga["nome"] . "</option>";
	}
	echo "</select></br>";
	include("password.html");
	echo "</br></br><span>File: </span><input type='file' name='file1'></br>";
	echo "</br></br><input type= 'submit' method='post' value='ISCRIVITI' style='font-size:11pt;margin-left:30%;'/>";
}
}
	echo "</main>";
	include("footer.html");
?>
</body>
</html>
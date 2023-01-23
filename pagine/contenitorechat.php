<html>
<head>
<script>
function chatVisibile(){
if(document.getElementById("contenuto").style.visibility == 'hidden'){
	document.getElementById("contenuto").style.visibility="visible";}
else if(document.getElementById("contenuto").style.visibility == 'visible'){
	document.getElementById("contenuto").style.visibility="hidden";}
}
</script>
<script>
function chatVisibileMex() {
	if(document.getElementById("messaggio").style.visibility == 'hidden'){
	document.getElementById("messaggio").style.visibility="visible";}
else if(document.getElementById("messaggio").style.visibility == 'visible'){
	document.getElementById("messaggio").style.visibility="hidden";}
}
function Nuovo() {
	if(document.getElementById("nuovomex").style.visibility == 'hidden'){
	document.getElementById("nuovomex").style.visibility="visible";}
else if(document.getElementById("nuovomex").style.visibility == 'visible'){
	document.getElementById("nuovomex").style.visibility="hidden";}
}
</script>
</head>
<body>
<?php
include("connessione.php");
if (isset($_SESSION["id"])){
if (!isset($_GET["messaggio"]) or $_GET["messaggio"]==2){ ?>
<div id="contenuto" style="position:fixed;left:83%;top:60%;width:15%;height:35%;background-color: #f2f5f2;visibility:hidden">
<?php
if (isset($_SESSION["id"]) && $_SESSION["tipo"] == 'd'){


		 $sql = "select distinct id_aziendai from chat where id_disoccupator=" . $_SESSION["id"] . " and id_aziendai > 0 union select distinct id_aziendar from chat where  id_disoccupatoi=" . $_SESSION["id"] . " and id_aziendar > 0";
	$ris = mysqli_query($conn, $sql);
			$conteggio = mysqli_num_rows($ris);
	while ($rigaaa = mysqli_fetch_array($ris)){
	$sqll = "select denominazione, foto from aziende where id_azienda =" . $rigaaa["id_aziendai"] ;
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<a href = 'index.php?id=" . $rigaaa["id_aziendai"] . "&messaggio=1'><div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<img src='immagini/" . $rigaa["foto"] . "' ></div>
		<div id='infoutentechat' >
		" . $rigaa["denominazione"] . "</div></div></a>";
	 }
	}
echo "<div style='border:1px solid grey;position:fixed;left:83%;top:89%;width:14.9%;height:5%;padding-top:1%;'  onclick='Nuovo()'>+ nuovo messaggio</div>";




echo "<div id='nuovomex' style='position:fixed;left:83%;top:60%;width:15%;height:35%;background-color: #f2f5f2;visibility:hidden'>";
	$sqll = "select id_azienda, denominazione, foto from aziende";
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<a href = 'index.php?id=" . $rigaaa["id_azienda"] . "&messaggio=1'><div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<img src='immagini/" . $rigaa["foto"] . "' ></div>
		<div id='infoutentechat' >
		" . $rigaa["denominazione"] . "</div></div></a>";
	 }echo "</div>";
	 
}
if (isset($_SESSION["id"]) && $_SESSION["tipo"] == 'a'){


		 $sql = "select distinct id_disoccupatoi from chat where id_aziendar=" . $_SESSION["id"] . " and id_disoccupatoi > 0 union select distinct id_disoccupator from chat where  id_aziendai=" . $_SESSION["id"] . " and id_disoccupator > 0";
	$ris = mysqli_query($conn, $sql);
			$conteggio = mysqli_num_rows($ris);
	while ($rigaaa = mysqli_fetch_array($ris)){
	$sqll = "select nome, cognome, foto from disoccupati where id_disoccupato =" . $rigaaa["id_disoccupatoi"] ;
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<a href = 'index.php?id=" . $rigaaa["id_disoccupatoi"] . "&messaggio=1'><div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<img src='immagini/" . $rigaa["foto"] . "'></div>
		<div id='infoutentechat' >
		" . $rigaa['nome'] . " " . $rigaa["cognome"] . "</div></div></a>";

		 
	 }

	}

	
	
	echo "<div id='nuovomex' style='position:fixed;left:83%;top:60%;width:15%;height:35%;background-color: #f2f5f2;visibility:hidden'>";
	$sqll = "select id_disoccupato, nome, cognome, foto from disoccupati";
	$riss = mysqli_query($conn, $sqll);
	 while ($rigaa = mysqli_fetch_array($riss)){
		 echo "<a href = 'index.php?id=" . $rigaaa["id_disoccupato"] . "&messaggio=1'><div  id='rigautentefiltro'>
		<div id='fotoutentechat'>";
		echo "<img src='immagini/" . $rigaa["foto"] . "' ></div>
		<div id='infoutentechat' >
		" . $rigaa["nome"] . " " . $rigaa["cognome"] ."</div></div></a>";
	 }echo "</div>";
}
echo "</div><div style='position:fixed;left:83%;top:95%;width:15%;height:5%;background-color:#760c0c;' onclick='chatVisibile()'>Chat</div>";
}



elseif(isset($_GET["messaggio"]) && $_GET["messaggio"]==1){
?>


<div id="messaggio" style="position:fixed;left:83%;top:60%;width:15%;height:35%;background-color: #f2f5f2;visibility:visible;">

<?php
if (isset($_SESSION["id"]) && $_SESSION["tipo"] == 'd'){
	echo "<a href = 'index.php?messaggio=2'><div id='indietro'><--</div></a></br>";

	
	$id_utente = $_GET["id"];
	$sql="select count(*) as conteggio from chat where (id_disoccupatoi=" . $_SESSION["id"] . " and id_aziendar=" . $id_utente . ") or (id_disoccupator =" . $_SESSION["id"] . " and id_aziendai =" . $id_utente . ")";
	$risssss = mysqli_query($conn, $sql);
	$rigaaaa = mysqli_fetch_array($risssss);
	if ($rigaaaa["conteggio"]==0){
		echo "<form method = 'get' action = 'salvamessaggio.php'><input style = 'height: 12%; width: 70%' type = 'text' name='mex' placeholder = 'Scrivi un messaggio'><input type = 'submit' value = 'Invia' style = 'height: 12%; width: 25%'><input type='text' name='id' style='visibility:hidden' value='" . $id_utente . "'></form>";
	}
	else{
	
	
	$sql = "select foto from aziende where id_azienda =" . $id_utente;
	$riss = mysqli_query($conn, $sql);
	$rigaa = mysqli_fetch_array($riss);
	$sql="select id_aziendai, id_aziendar, id_disoccupatoi, id_disoccupator, messaggio from chat where (id_disoccupatoi=" . $_SESSION["id"] . " and id_aziendar=" . $id_utente . ") or (id_disoccupator =" . $_SESSION["id"] . " and id_aziendai =" . $id_utente . ")";
	$ris = mysqli_query($conn, $sql);
	echo "<div id='testochat' style=' overflow-y: scroll;  font-size: 13pt;'>";
	while($riga=mysqli_fetch_array($ris)){
		if($riga["id_disoccupator"]!=0){
			echo "<div id='fotoutentechat'>";
		echo "<img src='immagini/" . $rigaa["foto"] . "' ></div><p style = 'text-align: left; padding-left: 25%;' >" . $riga["messaggio"] . "</p></br>";
		}
		elseif($riga["id_disoccupatoi"]!=0){
			echo "<p style = 'text-align: right; '>" . $riga["messaggio"] . "</p></br>";
		}
	}
	echo "</div>";
	echo "<form method = 'get' action = 'salvamessaggio.php'><input style = 'height: 12%; width: 70%' type = 'text' name='mex' placeholder = 'Scrivi un messaggio'><input type = 'submit' value = 'Invia' style = 'height: 12%; width: 25%'><input type='text' name='id' style='visibility:hidden' value='" . $id_utente . "'></form>";
	
}}
elseif(isset($_SESSION["id"]) && $_SESSION["tipo"] == 'a'){
	$id_utente = $_GET["id"];
	$sql="select id_aziendai, id_aziendar, id_disoccupatoi, id_disoccupator, messaggio from chat where (id_aziendai=" . $_SESSION["id"] . " and id_disoccupator=" . $id_utente . ") or (id_aziendar =" . $_SESSION["id"] . " and id_disoccupatoi =" . $id_utente . ")";
	$ris = mysqli_query($conn, $sql);
	echo "<div id='testochat' style=' overflow-y: scroll; border: 2px solid #191970; font-size: 13px;'>";
	while($riga=mysqli_fetch_array($ris)){
		if($riga["id_disoccupator"]!=0){
			echo "<div id='testochat'><p style = 'text-align: right'>" . $riga["messaggio"] . "</p></br>";
		}
		elseif($riga["id_disoccupatoi"]!=0){
			echo "<p style = 'text-align: left'>Disoccupato: " . $riga["messaggio"] . "</p></div></br>";
		}
	}
	echo "</div>";
		echo "<form method = 'get' action = 'salvamessaggio.php?id=$id_utente'><input style = 'height: 12%; width: 70%' type = 'text' name='mex' placeholder = 'Scrivi un messaggio'><input type = 'submit' value = 'Invia' style = 'height: 12%; width: 25%'><input type='text' name='id' style='visibility:hidden' value='" . $id_utente . "'></form>";

}
echo "</div><div style='position:fixed;left:83%;top:95%;width:15%;height:5%;background-color:#760c0c;' onclick='chatVisibileMex()'>Chat</div>";
}}
	?>

</body>

</html>

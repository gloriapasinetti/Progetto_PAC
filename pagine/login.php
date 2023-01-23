<html>
<body>
<?php
include("connessione.php");
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$sql= "select id_disoccupato from disoccupati where email ='" . $email . "' and password ='" . $password . "'";
$ris = mysqli_query($conn,$sql);
if(mysqli_num_rows($ris) == 1) {
	$riga=mysqli_fetch_array($ris);
	$_SESSION['id']=$riga["id_disoccupato"];
	$_SESSION['tipo']="d";
	header("location: index.php");
}
else{
	$sql= "select id_azienda from aziende where email ='" . $email . "' and password ='" . $password . "'";
	$ris = mysqli_query($conn,$sql);
	if(mysqli_num_rows($ris) == 1){
	$riga=mysqli_fetch_array($ris);
	$_SESSION['id']=$riga["id_azienda"];
	$_SESSION["tipo"]="a";
	header("location: index.php");
	}
	else{
		header("location: index.php?errore=1#win1"); //per far apparire la finestra logout aperta
	}
	
}
?>
</body>
</html>
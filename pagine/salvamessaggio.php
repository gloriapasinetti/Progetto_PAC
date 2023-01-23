<?php
include ("connessione.php");
?>
<?php
session_start();
$messaggio = $_GET["mex"];
$id_utente = $_GET["id"];
$sql = "insert into chat(id_disoccupatoi,id_aziendar,messaggio) values (" . $_SESSION['id'] . ",$id_utente,'$messaggio')";
$ris = mysqli_query($conn,$sql);
header("location:index.php?messaggio=1&id=$id_utente");


?>
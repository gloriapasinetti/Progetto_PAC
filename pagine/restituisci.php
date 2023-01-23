<?php
$hostname="localhost";
$username="root";
$password="usbw";
$dbase="ad_hoc";
$conn=mysqli_connect($hostname,$username,$password,$dbase);
$prov=$_POST["provincia"];
mysqli_set_charset($conn,"utf8");
$sqll="SELECT id,comune FROM comuni WHERE prov='" . $prov . "'";
$riss=mysqli_query($conn, $sqll);
	$str="";
	$idstr="";
	while($riga=mysqli_fetch_array($riss)){	
	    $str .= $riga["id"] . "-" . $riga["comune"] . "|";
    }
mysqli_close($conn);	
$str=substr($str, 0, -1);
echo $str;
?> 

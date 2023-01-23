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

<?php
include("intestazione2.php");
include("connessione.php");
?>
<main>
<div id='manuale'>
<h1> Come fare una buona impressione al colloquio di lavoro?</h1>
Fare un buon colloquio di lavoro non è sempre una passeggiata. In quei pochi minuti bisogna fare buona impressione, mostrarsi professionali, competenti, ma anche dotati di personalità,
 carattere e di quel tocco in più che può fare la differenza. Qui di seguito ti proponiamo dei consigli molto utili da seguire:</br></br>
 <b>1.</b> Sii te stesso e affronta il colloquio con personalità e ti aiuterà sicuramente a distinguerti da tutti gli altri candidati. </br></br>
<b>2.</b> Fatti desiderare. Non mostrarti supplichevole e non far capire che “hai bisogno” di quel lavoro.</br></br>
 <b>3.</b> Hai degli hobby? Parlane! Un blog? Esperienze interessanti? Segnalale! Servono a comunicare versatilità, elasticità mentale, capacità manuali e di relazione.</br></br>
<b>4.</b> La trasparenza è una qualità che potrebbe premiarti non solo per fare una buona impressione al colloquio ma anche sul lungo termine.</br></br>
 <b>5.</b> Cura il tuo outfit senza esagerare: scegli abiti che sappiano metterti a tuo agio e che trasmettano sicurezza in te stesso e professionalità.</br></br>
<b>6.</b>Per le donne: evita l’eccesso di trucco o accessori, senza però sembrare trasandata. La regola base per non sbagliare è: mai strafare!</br></br>
<b>7.</b> Porre domande o chiedere spiegazioni non solo ti aiuta a capire meglio il ruolo per il quale ti stai candidando, ma è anche sinonimo di curiosità e intelligenza.</br></br>
<b>8.</b> Guarda negli occhi la persone/le persone che ti accolgono, scambia la stretta di mano (niente mani di stracchino o tenaglie) e sorridi a chi hai di fronte.</br></br>
<h2 style="text-align:center"> <b>BUONA FORTUNA! </b><h2>
<a href = 'https://europass.cedefop.europa.eu/editors/it/cv/compose' > <button id='bottoneiscriviti' style = "margin-left:800px; margin-top:100px"> Crea il tuo curriculum! </button>
 
 </div>
</main>

<?php
include("footer.html");
?>

</body>
</html>
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
?>
<main>
<div id='manuale' ><h1 style = "text-align:center"> Il tuo colloquio di lavoro </h1>
Il colloquio di lavoro è il momento più importante del processo di selezione, richiede la massima concentrazione e un’ottima preparazione.
 Arriva puntale, cura il tuo aspetto e soprattutto sii preparato sull’azienda e sulla posizione per cui ti candidi. 
 Raccogli le informazioni sull'azienda in modo da comprenderne il contesto e il mercato di riferimento; 
 informati sulla persona che incontrerai, sul suo ruolo in azienda.</br></br>
Devi essere consapevole che per affrontare con successo un colloquio non è sufficiente "raccontare" le competenze maturate durante il percorso di studi
 o le esperienze di lavoro, ma è importante farlo nel modo giusto, con efficacia, dimostrando motivazione e interesse per l'azienda e la posizione a cui
 ti sei candidato e, cosa più difficile tra tutte, il perché dovrebbero scegliere proprio te. </br></br>
Timidezza e tensione possono giocare brutti scherzi ed è quindi importante arrivare a un colloquio di lavoro preparati per ridurre
 al minimo il rischio di fare errori o brutte figure che potrebbero compromettere il buon esisto della selezione. 
 Il colloquio può essere dal vivo, telefonico o via Skype, ma le regole per affrontarlo al meglio sono le stesse.</br></br>
 <h2 style = "text-align:center"> Le 5 regole per un colloquio al top </h2></br></br>
    1. L’importanza dell’orario. È buona norma presentarsi 5/10 minuti prima del colloquio, non arrivare in ritardo.</br></br>
    2. L’abbigliamento. Vestiti come immagini che richieda lo stile aziendale. Prediligi un abbigliamento sobrio e formale.</br></br>
    3. Sapersi raccontare. Imposta una presentazione sulle tue competenze e esperienze, sui tuoi punti di forza e sulle caratteristiche che ti rendono il candidato giusto per la posizione a cui ti sei candidato e per cui sei stato selezionato.</br></br>
    4. Relazionarsi correttamente. Con il selezionatore stai composto, guardalo negli occhi, ascolta le domande, parla con calma e rispondi in modo sintetico ma preciso. Mostra interesse verso la posizione per cui sei candidato, poni domande utili per comprenderla meglio.</br></br>
    5. Le 3 C: coerenza, chiarezza e curiosità. Cerca di essere coerente e di non contraddirti. La chiarezza è fondamentale e se ne hai l’occasione fai alcune domande sull’azienda e sul ruolo. Ricorda, la curiosità denota motivazione. Non barare, sii sempre onesto e trasparente.</br></br>

 </div>

	
	
	
	
	
	<?php
	echo "</main>";
	include("footer.html");
	
?>
</body>
</html>
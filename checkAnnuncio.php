<?php

include_once "db/connect.php";
include_once "common/funzioni.php";
session_start();

$errore = array();
$dati=array();
$nomeannuncio=$_POST["nomeannuncio"];
$nomeprodotto=$_POST["nomeprodotto"];
$prezzo=$_POST["prezzo"];
$categoria = $_POST["category"];
$sottocategoria = $_POST["sottocategoria"];
$visibilita = $_POST["visibilita"];
if (isset($_POST["SP"])) {
	$nuovousato = $_POST["SP"];
}
else $nuovousato = "";
if (isset($_POST["garanzia"])) {
	$garanzia = $_POST["garanzia"];
}
else $garanzia = 0;
$tempogaranzia = $_POST["tempogaranzia"];
$tempoUsura = $_POST["tempousura"];
$statoUsura = $_POST["statoUsura"];
$codicefiscale = $_GET["codicefiscale"];

if (isset($_SESSION["indirizzo"])) {
	$indirizzoAttuale = $_SESSION["indirizzo"];
	print_r($indirizzoAttuale);
}
else $errore["indirizzo"] = "8";

//Per prendere l'indirizzo della foto
if ($_POST["foto"]!="") {
	$foto = "images/" . $_POST["foto"];
}
else $foto = "images/Not-Available.png";


$sottocategorie = array();
$sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altro'];
$sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori', 'Telecamere', 'Microfoni', 'Altro'];
$sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro'];
$sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro'];

$sottoCat = $sottocategorie[$categoria];


	if (empty($nomeannuncio))
	{
		$errore["nomeannuncio"]="1";
		$dati["nomeannuncio"]="";
	}
	else
	{
		$dati["nomeannuncio"]=$nomeannuncio;
	}

	if (empty($nomeprodotto))
	{
		$errore["nomeprodotto"]="2";
		$dati["nomeprodotto"]="";
	}
	else
		$dati["nomeprodotto"]=$nomeprodotto;

	if (empty($prezzo))
	{
		$errore["prezzo"]="3";
	  $dati["prezzo"]="";
	}
	else $dati["prezzo"]=$prezzo;

	if (empty($visibilita))
	{
		$dati["visibilita"]="";
	}
	else $dati["visibilita"]=$visibilita;

	if (empty($nuovousato)) {
		$errore["SP"]="4";
	  $dati["SP"]="";
	}else{
			if ($nuovousato=="nuovo") {
				$dati["SP"]="nuovo";
				if ($garanzia==0) {
					$tempogaranzia = "";
				}
				else {
					if (empty($tempogaranzia)) {
						$errore["tempogaranzia"]="5";
					  $dati["tempogaranzia"]="";
					}
					else $dati["tempogaranzia"]=$tempogaranzia;
				}
			}
			if ($nuovousato=="usato") {
				$dati["SP"]="usato";
				if ($tempoUsura=="") {
					$errore["tempousura"]="6";
					$dati["tempousura"]="";
				} else {
					$dati["tempousura"] = $tempoUsura;
				}
					if ($statoUsura=="") {
						$errore["statoUsura"]="7";
						$dati["statoUsura"] = "";
					} else {
						$dati["statoUsura"] = $statoUsura;
					}
				}
			}

		if (count($errore)>0)
		{
			// header('location:creareAnnuncio.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
		}
		else
		{

			$via = $indirizzoAttuale[0];
			$comune = $indirizzoAttuale[1];
			$regione = $indirizzoAttuale[2];
			$provincia = $indirizzoAttuale[3];
			echo $via;
			echo $comune;
			echo $regione;
			echo $provincia;


			$sql = "INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`, `nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`,
								`copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`)
							VALUES (NULL, '$codicefiscale', '$via', '$comune', '$regione', '$provincia',
											'$nomeannuncio', '$nomeprodotto', '$foto', '$prezzo', '$nuovousato', '$tempoUsura', '$statoUsura',' $garanzia',
											'$tempogaranzia', NULL, '$visibilita', '$categoria', '$sottocategoria')";
      $data = mysqli_query($cid, $sql);
			print_r($data);
			if ($data) {
				echo "hey";

				$query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'in vendita', current_timestamp())";
				$data = mysqli_query($cid, $query);
				if ($data) {
					echo "hey2";

			// 		// header('location:creareAnnuncio.php?status=ok&dati=' . serialize($dati));
				}
				else {
					echo "problems2";
				}
			}
			else "Problems";
		}
?>

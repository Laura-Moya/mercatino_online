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
}
else $errore["indirizzo"] = "8";

//Per prendere l'indirizzo della foto
if ($_POST["foto"]!="") {
	$foto = "images/" . $_POST["foto"];
}
else $foto = "images/Not-Available.png";


$sottocategorie = array();
$sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altri elettrodomestici'];
$sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori fotografici', 'Telecamere', 'Microfoni', 'Altro da foto e video'];
$sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro da abbigliamento'];
$sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro da hobby'];

$sottoCat = $sottocategorie[$categoria];
$sottoCat = $sottoCat[$sottocategoria];


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
			if ($nuovousato=="1") {
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
			if ($nuovousato=="2") {
				$dati["SP"]="usato";
				$nuovousato="0";
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



			$via = $indirizzoAttuale[0];
			$comune = $indirizzoAttuale[1];
			$provincia = $indirizzoAttuale[2];
			$regione = $indirizzoAttuale[3];

				$sql = "INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`, `nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`,
									`copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`)
								VALUES (NULL, '$codicefiscale', '$via', '$comune', '$regione', '$provincia',
												'$nomeannuncio', '$nomeprodotto', '$foto', '$prezzo', '$nuovousato', '$tempoUsura', '$statoUsura',' $garanzia',
												'$tempogaranzia', NULL, '$visibilita', '$categoria', '$sottoCat')";
	      $data = mysqli_query($cid, $sql);

					if ($data) {
						$sql="SELECT codice
									FROM `annuncio`
									WHERE venditore ='$codicefiscale' AND via = '$via' AND comune='$comune' AND regione='$regione' AND provincia='$provincia' AND
									 nome_annuncio= '$nomeannuncio' AND nome_prodotto= '$nomeprodotto' AND foto= '$foto' AND prezzo='$prezzo'AND nuovo='$nuovousato' AND
									 tempo_usura='$tempoUsura' AND stato_usura='$statoUsura' AND garanzia='$garanzia' AND copertura_garanzia='$tempogaranzia' AND
									  visibilita='$visibilita'AND categorie='$categoria' AND sottocategorie='$sottoCat'";
						$res = mysqli_query($cid, $sql);
						$codice=$res->fetch_row();
						echo $codice[0];
						echo $sql;

					if ($codice[0]!=""){
						$query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice[0]', 'in vendita', current_timestamp())";
						$data = mysqli_query($cid, $query);
					} else {
						$errore["db"]="9";
					}
				}



			if (count($errore)>0)
			{
				header('location:creareAnnuncio.php?status=ko3&errore=' . serialize($errore). '&dati=' . serialize($dati));
			}
			else
			{
				header('location:prodottiInVendita.php?nuovoannuncio=ok');
			}

?>

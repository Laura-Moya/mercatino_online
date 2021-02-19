<?php

include_once "db/connect.php";
include_once "common/funzioni.php";


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
		echo $visibilita;

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
			header('location:creareAnnuncio.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
		}
		else
		{
			// VALUES (NULL, 'MRRCLS06S13H501K', 'aldo moro 76', 'bologna', 'emilia romagna', 'bo', 'si vende cellulare usato', 'Philips 480', NULL, '500', '1', NULL, NULL, NULL, NULL, NULL, 'pubblica', 'Foto e Video', 'Altro2');
			$sql = "INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`,
																			`nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`,
																			 `copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`)
							VALUES (NULL, '$codice_fiscale[0]', '', '', '', '', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 'privata', '', '')";
      $data = mysqli_query($cid, $sql);
			header('location:creareAnnuncio.php?status=ok&dati=' . serialize($dati));
		}
?>

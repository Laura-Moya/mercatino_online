<?php

include_once "db/connect.php";
include_once "common/funzioni.php";


$dati=array();
$nomeannuncio=$_GET["nomeannuncio"];
$nomeprodotto=$_GET["nomeprodotto"];
$prezzo=$_GET["prezzo"];
$categoria = $_GET["category"];
$sottocategoria = $_GET["sottocategoria"];
$visibilita = $_GET["visibilita"];
$nuovousato = $_GET["SP"];
$garanzia = $_GET["garanzia"];
$tempogaranzia = $_GET["tempogaranzia"];
$tempoUsura = $_GET["tempousura"];
$statoUsura = $_GET["statoUsura"];

$sottocategorie = array();
$sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altro'];
$sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori', 'Telecamere', 'Microfoni', 'Altro'];
$sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro'];
$sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro'];


echo $sottocategoria;
echo $tempogaranzia;
echo $categoria;

$sottoCat = $sottocategorie[$categoria];
echo $sottoCat[$sottocategoria];


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


	if (empty($nuovousato)) {
		$errore["SP"]="4";
	  $dati["SP"]="";
	}
	else{
			//Controllo di Nuovo
			if ($dati["SP"]=1) {
				if (empty($garanzia)) {
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
			//Controllo di Usato
			else {
				if (empty($tempoUsura) || empty($statoUsura)) {
					$errore["tempogaranzia"]="7";
					$dati["tempogaranzia"]="";
				}
				else {
					$dati["tempoUsura"] = $tempoUsura;
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
			$sql = "INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`,
																			`nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`,
																			 `copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`)
							VALUES (NULL, '', '', '', '', '', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 'privata', '', '')";
      $data = mysqli_query($cid, $sql);
			header('location:creareAnnuncio.php?status=ok&dati=' . serialize($dati));
		}
?>

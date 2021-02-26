<?php

include_once "../db/connect.php";
include_once "../common/funzioni.php";
session_start();

$errore = array();
$dati=array();

$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$password=$_POST["password"];
$nuovaImmagine = $_POST["foto"];

//Per prendere l'immagine che avevamo già
$risultato = leggiUtente($cid, $codice_fiscale[0]);
$utente = $risultato['contenuto'];
// Immagine vecchia
$immagine = $utente[3];


// if (isset($_SESSION["indirizzo"])) {
// 	$indirizzoAttuale = $_SESSION["indirizzo"];
// 	if (empty($indirizzoAttuale)) {
// 		$errore["indirizzo"] = "8";
// 	}
// } else {
// 	$errore["indirizzo"] = "8";
// }

//Per prendere l'indirizzo della foto
if ($nuovaImmagine != "") {
	$foto = "../images/" . $nuovaImmagine;
}
else $foto = $immagine;

	if (empty($nome))
	{
		$errore["nome"]="1";
		$dati["nome"]="";
	}
	else
	{
		$dati["nome"]=$nome;
	}

	if (empty($cognome))
	{
		$errore["cognome"]="2";
		$dati["cognome"]="";
	}
	else
		$dati["cognome"]=$cognome;

	if (empty($password))
	{
		$errore["password"]="3";
	  $dati["password"]="";
	}
	else $dati["password"]=$password;


				$sql = "UPDATE `utente`
								SET `nome` = '$nome', `cognome` = '$cognome', `immagine` = '$foto', `password` = '$password'
								WHERE `utente`.`codice_fiscale` = '$codice_fiscale[0]'";

	      $data = mysqli_query($cid, $sql);

					if ($data) {
						echo "ciao";
					} else {
						$errore["db"]="4";
					}




			if (count($errore)>0)
			{
				// header('location:../frontend/modificaAnnunci.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
			}
			else
			{//Cambiare
				// header('location:../frontend/prodottiInVendita.php?nuovoannuncio=ok');
			}

?>

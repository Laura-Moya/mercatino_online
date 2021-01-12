<?php

include_once "db/connect.php";
include_once "common/funzioni.php";

$dati=array();
$nome=$_GET["nome"];
$cognome=$_GET["cognome"];
$email=$_GET["email"];
$password=$_GET["password"];
$codicefiscale=$_GET["codice-fiscale"];
$tipoutente=$_GET["tipoutente"];
$immagine=$_GET["immagine"];


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

if (empty($email))
{
	$errore["email"]="3";
  $dati["email"]="";
}
$dati["email"]=$email;

if (empty($password))
{
	$errore["password"]="4";
  $dati["password"]="";
}
$dati["password"]=$password;

$dati["tipoutente"]=$tipoutente;

if (empty($codicefiscale))
{
	$errore["codice-fiscale"]="5";
  $dati["codice-fiscale"]="";
}
$dati["codice-fiscale"]=$codicefiscale;

$dati["immagine"]=$immagine;

if (count($errore)>0)
{
	header('location:registrazione.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
}
else
{
	header('location:registrazione.php?status=ok&dati=' . serialize($dati));
}
$ris2 = checkMail($cid, $email, $password);
	if ($ris2["status"] == "ok") {
		$parameter = "Location: registrazione.php?errore=utentegiaregistrato";
		header($parameter);
	}
	else{
		$ris = newUser($cid, $nome, $cognome, $email, $password, $tipoutente, $immagine, $codicefiscale);
		if ($ris["status"] == "ok")
			{
				echo "Benvenuto " . $email;
			}
		else
				{
					$parameter = "Location: registrazione.php?errore=connectionbd";
					header($parameter);
				}
	}

?>

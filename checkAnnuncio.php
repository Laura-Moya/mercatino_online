<?php

include_once "db/connect.php";
include_once "common/funzioni.php";

$dati=array();
$nomeannuncio=$_GET["nomeannuncio"];
$nomeprodotto=$_GET["nomeprodotto"];
$prezzo=$_GET["prezzo"];



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
$dati["prezzo"]=$prezzo;


if (count($errore)>0)
{
	header('location:creareAnnuncio.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
}
else
{
	header('location:creareAnnuncio.php?status=ok&dati=' . serialize($dati));
}
?>

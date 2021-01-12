<?php

include_once "db/connect.php";
include_once "common/funzioni.php";

$dati=array();
$nome_annuncio=$_GET["nome_annuncio"];
$nome_prodotto=$_GET["nome_prodotto"];
$prezzo=$_GET["prezzo"];



if (empty($nome_annuncio))
{
	$errore["nome_annuncio"]="1";
	$dati["nome_annuncio"]="";
}
else
{
	$dati["nome_annuncio"]=$nome_annuncio;
}

if (empty($nome_prodotto))
{
	$errore["nome_prodotto"]="2";
	$dati["nome_prodotto"]="";
}
else
	$dati["nome_prodotto"]=$nome_prodotto;

if (empty($prezzo))
{
	$errore["prezzo"]="3";
  $dati["prezzo"]="";
}
$dati["prezzo"]=$prezzo;


if (count($errore)>0)
{
	header('location:registrazione.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
}
else
{
	header('location:registrazione.php?status=ok&dati=' . serialize($dati));
}
?>

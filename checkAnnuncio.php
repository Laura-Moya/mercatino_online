<script type="text/javascript">
var sottocategorie = {};
sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altro'];
sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori', 'Telecamere', 'Microfoni', 'Altro'];
sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro'];
sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro'];
</script>

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

echo $sottocategoria;
echo $tempogaranzia;
echo $categoria;

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



// if (count($errore)>0)
// {
// 	header('location:creareAnnuncio.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
// }
// else
// {
// 	header('location:creareAnnuncio.php?status=ok&dati=' . serialize($dati));
// }
?>

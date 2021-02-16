<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codice = $_GET["codice"];
$stato = $_GET["stato"];


if ($stato=="invendita") {
  header("Location:prodottiInVendita.php?codice=".$codice);
} elseif ($stato=="eliminato") {
  header("Location:prodottiEliminati.php?codice=".$codice);
}elseif ($stato=="venduto") {
  header("Location:prodottiVenduti.php?codice=".$codice);
}
else {
  header("Location:index.php?errore=erroreDiConessione");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
<body>
  <?php include "../db/connect.php";

$codice = $_GET["codice"];
$stato = $_GET["stato"];


if ($stato=="invendita") {
  header("Location:../frontend/prodottiInVendita.php?codice=".$codice);
} elseif ($stato=="eliminato") {
  header("Location:../frontend/prodottiEliminati.php?codice=".$codice);
}elseif ($stato=="venduto") {
  header("Location:../frontend/prodottiVenduti.php?codice=".$codice);
}
else {
  header("Location:../frontend/index.php?errore=erroreDiConessione");
}

?>

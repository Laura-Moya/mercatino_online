<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
<body>
  <?php include "../db/connect.php";

$puntualita = $_POST['puntualita'];
$serieta = $_POST['serieta'];
$codiceFiscaleValutato = $_GET["codiceFiscaleValutato"];
$codicefiscalevaluta = $_GET["codicefiscalevaluta"];
$acquirente =  $_GET["acquirente"];
$prodotto =  $_GET["prodotto"];



if ($codicefiscalevaluta == $acquirente){
  $query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`, `prodotto`)
            VALUES ('$codicefiscalevaluta', '$codiceFiscaleValutato', '$serieta', '$puntualita','$prodotto')";
  $data = mysqli_query($cid, $query);

  if ($data) {
    header("Location: ../frontend/prodottiAcquistati.php?messaggio=valutazioneok");
  }
  else {
  header("Location: ../frontend/prodottiAcquistati.php?errore=errore");
  }
} else {
  $query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`, `prodotto`)
            VALUES ('$codicefiscalevaluta', '$acquirente', '$serieta', '$puntualita','$prodotto')";
  $data = mysqli_query($cid, $query);

  if ($data) {
    header("Location: ../frontend/prodottiAcquistati.php?messaggio=valutazioneok");
  }
  else {
  header("Location: ../frontend/prodottiAcquistati.php?errore=errore");
}
}


?>

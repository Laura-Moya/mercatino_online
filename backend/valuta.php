<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "/common/header.php";?>
  </head>
<body>
  <?php include "/db/connect.php";

$puntualita = $_POST['puntualita'];
$serieta = $_POST['serieta'];
$codiceFiscaleValutato = $_GET["codiceFiscaleValutato"];
$codicefiscalevaluta = $_GET["codicefiscalevaluta"];
$acquirente =  $_GET["acquirente"];

echo "$puntualita </br>";
echo "$serieta </br>";
echo "$codiceFiscaleValutato </br>";
echo $codicefiscalevaluta. ' </br>';
echo $acquirente;

if ($codicefiscalevaluta == $acquirente){
  $query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
            VALUES ('$codicefiscalevaluta', '$codiceFiscaleValutato', '$serieta', '$puntualita')";
  $data = mysqli_query($cid, $query);

  if ($data) {
    header("Location: ../prodottiAcquistati.php?messaggio=valutazioneok");
  }
  else {
  header("Location: ../prodottiAcquistati.php?errore=errore");
  }
} else {
  $query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
            VALUES ('$codicefiscalevaluta', '$acquirente', '$serieta', '$puntualita')";
  $data = mysqli_query($cid, $query);

  if ($data) {
    header("Location: ../prodottiAcquistati.php?messaggio=valutazioneok");
  }
  else {
  header("Location: ../prodottiAcquistati.php?errore=errore");
}
}


?>

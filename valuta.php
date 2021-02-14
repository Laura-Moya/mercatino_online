<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codiceFiscaleValuta = $_GET["codiceFiscaleValuta"];
$codiceFiscaleValutato = $_GET["codiceFiscaleValutato"];
$serieta = $_GET["serieta"];
$puntualita = $_GET["puntualita"];
echo "$serieta </br>";
echo "$puntualita </br>";
echo "$codiceFiscaleValuta </br>";
echo "$codiceFiscaleValutato";

$query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
          VALUES ('$codiceFiscaleValuta', '$codiceFiscaleValutato', '$serieta', '$puntualita')";

$data = mysqli_query($cid, $query);

if ($data) {
  header("Location: prodottiAcquistati.php?messaggio=valutazioneok");
}
else {
header("Location: prodottiAcquistati.php?errore=errore");
}

?>

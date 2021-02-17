<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$puntualita = $_POST['puntualita'];
$serieta = $_POST['serieta'];

echo "$puntualita </br>";
echo "$serieta </br>";
echo "$codiceFiscaleValutato";

$query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
          VALUES ('$codice_fiscale[0]', '$codiceFiscaleValutato', '$serieta', '$puntualita')";

echo "ciao";
echo "$query";
$data = mysqli_query($cid, $query);
echo "$data";
  (isset($_SESSION["utente"])& isset($_POST['send']))
if ($data) {
  header("Location: prodottiAcquistati.php?messaggio=valutazioneok");
}
else {
header("Location: prodottiAcquistati.php?errore=errore");
}

?>

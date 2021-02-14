<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codiceFiscaleValuta = $_POST["codiceFiscaleValuta"];
$codiceFiscaleValutato = $_POST["codiceFiscaleValutato"];
$serieta = $_POST["serieta"];
$puntualita = $_POST["puntualita"];

$query = "INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`)
          VALUES ('$codicefiscaleValuta', '$codicefiscaleValutato', '$serieta', '$puntualita')";

$data = mysqli_query($cid, $query);

if ($data) {
  header("Location: profiloVenditore.php");
}
else {
  echo "Problems";
}

?>

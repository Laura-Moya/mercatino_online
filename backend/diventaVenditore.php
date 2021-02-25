<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
<body>
  <?php include "../db/connect.php";
        include "../common/funzioni.php";


session_start();
$risultato = prendereCF($cid, $_SESSION["utente"]);
$codiceFiscaleDiventa = $risultato['contenuto'];
$query = "UPDATE `utente` SET `tipo_utente` = 'venditore' WHERE `utente`.`codice_fiscale` = '$codiceFiscaleDiventa[0]'";

$data = mysqli_query($cid, $query);

if ($data) {
  header("Location: ../frontend/profiloVenditore.php");
}
else {
  echo "Problems";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "db/connect.php";

$codiceFiscaleDiventa = $_GET["codiceFiscale"];
$query = "UPDATE `utente` SET `tipo_utente` = 'venditore' WHERE `utente`.`codice_fiscale` = '$codiceFiscaleDiventa'";

$data = mysqli_query($cid, $query);

if ($data) {
  header("Location: profiloVenditore.php");
}
else {
  echo "Problems";
}

?>

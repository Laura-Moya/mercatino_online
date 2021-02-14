<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codiceFiscaleElimina = $_GET["codiceFiscale"];
$query = "DELETE FROM `utente` WHERE `utente`.`codice_fiscale` = '$codiceFiscaleElimina'";

$data = mysqli_query($cid, $query);

if ($data) {
  session_start();
  session_unset();
  session_destroy();
  header("Location: index.php");
}
else {
  header("Location: index.php?errore=erroreDiConessione");
}

?>

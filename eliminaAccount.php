<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "db/connect.php";
  session_start();


$codiceFiscaleElimina = $_GET["codiceFiscale"];
$query = "DELETE FROM `utente` WHERE `utente`.`codice_fiscale` = '$codiceFiscaleElimina'";

$data = mysqli_query($cid, $query);

if ($data) {
  session_unset();
  session_destroy();
  header("Location: index.php?accounteliminato=ok");
}
else {
  header("Location: index.php?errore=erroreDiConessione");
}

?>

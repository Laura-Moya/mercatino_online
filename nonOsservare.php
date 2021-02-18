<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "db/connect.php";

$prodotto = $_GET["codice"];
$cf = $_GET["codicefiscale"];

$query = "DELETE FROM `osserva` WHERE `osserva`.`utente` = '$cf' AND `osserva`.`prodotto` = '$prodotto'";

$data = mysqli_query($cid, $query);
if ($data) {
  header("Location: osservati.php?nonosservare=ok");
}
else {
  echo "Problems";
}

?>

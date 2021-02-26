<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
<body>
  <?php include "../db/connect.php";

$prodotto = $_GET["codice"];
$cf = $_GET["codicefiscale"];
$query = "INSERT INTO `osserva` (`utente`, `prodotto`) VALUES ('$cf', '$prodotto')";

$data = mysqli_query($cid, $query);
if ($data) {
  header("Location: ../frontend/prodotto.php?codice=$prodotto");
}
else {
  echo "Problems";
}

?>

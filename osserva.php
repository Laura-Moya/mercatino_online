<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$prodotto = $_GET["codice"];
$cf = $_GET["codicefiscale"];
$query = "INSERT INTO `osserva` (`utente`, `prodotto`) VALUES ('$cf', '$prodotto')";

$data = mysqli_query($cid, $query);
echo $data;
if ($data) {
  header("Location: prodotto.php?codice=$prodotto");
}
else {
  echo "Problems";
}

?>

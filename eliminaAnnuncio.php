<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codice = $_GET["codice"];
$query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'eliminato', current_timestamp())";
$data = mysqli_query($cid, $query);

if ($data) {
  header("Location: prodottiInVendita.php");
}
else {
  echo "Problems";
}

?>

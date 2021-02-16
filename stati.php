<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";

$codice = $_GET["codice"];
$sql="SELECT * FROM `stato` WHERE stato.prodotto = '$codice'";
$data = mysqli_query($cid, $sql);

if ($data) {
  header("Location:prodottiInVendita.php");
}
else {
  header("Location:index.php?errore=erroreDiConessione");
}

?>

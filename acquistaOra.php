<?php
$codice=$_GET["codice"];
if(isset($_POST['AA'])){
  $preferisce = $_POST['AA'];
} else {
$preferisce = NULL;
}
if($preferisce != NULL){
  if($preferisce != "spedizione"){
    if(isset($_POST['P'])){
      $pagamento = $_POST['P'];
    } else {
    $pagamento = NULL;
    }
    if($pagamento != NULL){
      if($pagamento == "carta"){
          $intestatario = $_POST["intestatario"];
          $numero_carta = $_POST["numero_carta"];
          $data_scadenza = $_POST["data_scadenza"];
          $cvv = $_POST["cvv"];
          if ($intestatario=="" || $numero_carta=="" || $data_scadenza=="" || $cvv==""){
            header("Location: pagamento.php?errore=campivuoti&codice=".$codice);
          } elseif (strlen($numero_carta)!=16 || strlen($cvv)!=3) {
            header("Location: pagamento.php?errore=campierrati&codice=".$codice);
          } else {
            $query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'venduto', current_timestamp())";
            $data = mysqli_query($cid, $query);

            if ($data) {
            header("Location: index.php?acquisto=ok");
          } else {
        echo "vai direttamente ad acquista ora";
      }
    }
  } else{
    $intestatario = $_POST["intestatario"];
    $numero_carta = $_POST["numero_carta"];
    $data_scadenza = $_POST["data_scadenza"];
    $cvv = $_POST["cvv"];

    if ($intestatario=="" || $numero_carta=="" || $data_scadenza=="" || $cvv==""){
      header("Location: pagamento.php?errore=campivuoti&codice=".$codice);
    } elseif (strlen($numero_carta)!=16 || strlen($cvv)!=3) {
      header("Location: pagamento.php?errore=campierrati&codice=".$codice);
    } else {
      $query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'venduto', current_timestamp())";
      $data = mysqli_query($cid, $query);

      if ($data) {
      header("Location: index.php?acquisto=ok");
    }
  }
  }
}
 ?>

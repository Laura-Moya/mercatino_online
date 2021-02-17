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
            header("Location: pagamento.php?errore=ko&codice=".$codice);
          } else {
            
          }
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
      header("Location: pagamento.php?errore=ko&codice=".$codice);
    }
  }
  }
 ?>

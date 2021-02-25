
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "db/connect.php";


  $codice=$_GET["codice"];
  $codicefiscale = $_GET["codfisc"];
  $venditore = $_GET["venditore"];

  if(isset($_POST['AA'])){
    $preferisce = $_POST['AA'];
  }
  else {
    $preferisce = NULL;
  }
  if($preferisce != NULL)
  {
    if($preferisce != "spedizione")
    {
      if(isset($_POST['P'])){
        $pagamento = $_POST['P'];
      }
      else
      {
        $pagamento = NULL;
      }
      if($pagamento != NULL)
      {
        if($pagamento == "carta")
        {
            $intestatario = $_POST["intestatario"];
            $numero_carta = $_POST["numero_carta"];
            $data_scadenza = $_POST["data_scadenza"];
            $cvv = $_POST["cvv"];
            if ($intestatario=="" || $numero_carta=="" || $data_scadenza=="" || $cvv=="")
            {
              header("Location: pagamento.php?errore=campivuoti&codice=".$codice);
              echo "1";
            }
            elseif (!is_numeric($numero_carta) || !is_numeric($cvv))
            {
              header("Location: pagamento.php?errore=campierrati&codice=".$codice);
              echo "2";
            }
            else
            {
              $query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'venduto', current_timestamp())";
              $data = mysqli_query($cid, $query);
              echo "3";

              if ($data) {
                $sql = "UPDATE `annuncio` SET `acquirente` = '$codicefiscale' WHERE `annuncio`.`codice` = '$codice'";
                $res = mysqli_query($cid, $sql);
                if ($res) {
                  $sql="SELECT email FROM `utente` WHERE codice_fiscale = '$venditore'";
                  $res = mysqli_query($cid, $sql);
                  $mail=$res->fetch_row();
                  $message = "Vai a vedere sul tuo profilo di Mercatino_Online, troverai un nuovo prodotto venduto!";
                  $headers = "From: mariapatricianunez96@gmail.com";
                  $email = mail("$mail[0]", "Prodotto Acquistato", $message, $headers);
                  header("Location: index.php?acquisto=ok");
                }
              }

            }
          } else {

            $query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'venduto', current_timestamp())";
            $data = mysqli_query($cid, $query);

            if ($data) {
              $sql = "UPDATE `annuncio` SET `acquirente` = '$codicefiscale' WHERE `annuncio`.`codice` = '$codice'";
              $res = mysqli_query($cid, $sql);
              if ($res) {
                $sql="SELECT email FROM `utente` WHERE codice_fiscale = '$venditore'";
                $res = mysqli_query($cid, $sql);
                $mail=$res->fetch_row();
                $message = "Vai a vedere sul tuo profilo di Mercatino_Online, troverai un nuovo prodotto venduto!";
                $headers = "From: mariapatricianunez96@gmail.com";
                $email = mail("$mail[0]", "Prodotto Acquistato", $message, $headers);
              header("Location: index.php?acquisto=ok");
              }
            }
          }
    }
    } else {

      $intestatario = $_POST["intestatario"];
      $numero_carta = $_POST["numero_carta"];
      $data_scadenza = $_POST["data_scadenza"];
      $cvv = $_POST["cvv"];
      if ($intestatario=="" || $numero_carta=="" || $data_scadenza=="" || $cvv=="")
      {
        header("Location: pagamento.php?errore=campivuoti&codice=".$codice);
      }
      elseif (!is_numeric($numero_carta) || !is_numeric($cvv))
      {
        header("Location: pagamento.php?errore=campierrati&codice=".$codice);
      }
      else
      {
        $query = "INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES ('$codice', 'venduto', current_timestamp())";
        $data = mysqli_query($cid, $query);

        if ($data) {
          $sql = "UPDATE `annuncio` SET `acquirente` = '$codicefiscale' WHERE `annuncio`.`codice` = '$codice'";
          $res = mysqli_query($cid, $sql);
          if ($res) {
            $sql="SELECT email FROM `utente` WHERE codice_fiscale = '$venditore'";
            $res = mysqli_query($cid, $sql);
            $mail=$res->fetch_row();
            $message = "Vai a vedere sul tuo profilo di Mercatino_Online, troverai un nuovo prodotto venduto!";
            $headers = "From: mariapatricianunez96@gmail.com";
            $email = mail("$mail[0]", "Prodotto Acquistato", $message, $headers);
            header("Location: index.php?acquisto=ok");
          }
        }
      }
  }
}

 ?>

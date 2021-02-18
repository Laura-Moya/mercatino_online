
    <?php
    include "common/header.php";
    include "db/connect.php";
    include "common/funzioni.php";

    $nuovaVia = $_POST["nuovaVia"];
    $nuovoComune = $_POST["nuovoComune"];
    $nuovaRegione = $_POST["nuovaRegione"];
    $nuovaProvincia = $_POST["nuovaProvincia"];
    $codicefiscale = $_GET["codicefiscale"];


    $res = newIndirizzo($cid, $nuovaVia, $nuovoComune, $nuovaProvincia, $nuovaRegione);
    if ($res) {
      $sql = "INSERT INTO `vive` (`codice_fiscale`, `via`, `comune`, `provincia`, `regione`)
              VALUES ('$codicefiscale', '$nuovaVia', '$nuovoComune', '$nuovaProvincia', '$nuovaRegione')";
      $data = mysqli_query($cid, $sql);


      if ($data)
      {
        $parameter = "Location: index.php?Message=nuovoIndirizzoAggiunto";
        header($parameter);
      }
      else
      {
          header("Location: index.php?errore=erroreDB2");
      }
    }
    else
    {
        header("Location: index.php?errore=erroreDB");
    }


    ?>

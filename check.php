<?php

  include_once "db/connect.php";
  include_once "common/funzioni.php";

  $email = $_POST["email"];
  $password = $_POST["password"];

  $ris = checkMail($cid, $email);
  if ($ris["status"] == "ok")
  {
    $ris2 = isUser($cid, $email, $password);
    if ($ris2["status"] == "ok") {
      // Manca ricaricare la pagina
      echo "Benvenuto " . $email;
    }
    else{
      $parameter = "Location: index-errore.php?errore=password&login=$password";
      header($parameter);
    }
  }
  else
  {
    $parameter = "Location: index-errore.php?errore=email&login=$email";
    header($parameter);
  }


?>

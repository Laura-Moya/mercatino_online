<?php

  include_once "db/connect.php";
  include_once "common/funzioni.php";

  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($email))
  {
  	$errore["email"]="1";
  	$dati["email"]="";
  }
  else
  {
  	$dati["email"]=$email;
  }

  if (empty($password))
  {
  	$errore["password"]="2";
  	$dati["password"]="";
  }
  else
  {
  	$dati["password"]=$password;
  }

  $ris = checkMail($cid, $email);
  if ($ris["status"] == "ok")
  {
    $ris2 = isUser($cid, $email, $password);
    if ($ris2["status"] == "ok") {
      // Manca ricaricare la pagina
      //$_SESSION["logged"] = $email
      echo "Benvenuto " . $email;
    }
    else{
      $parameter = "Location: index.php?errore=password&login=$password";
      header($parameter);
    }
  }
  else
  {
    $parameter = "Location: index.php?errore=email&login=$email";
    header($parameter);
  }


?>

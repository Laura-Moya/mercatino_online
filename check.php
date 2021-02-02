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
      // Manca ricaricare la pagina AJAX
      session_start();
      $_SESSION["utente"] = $email;
      $_SESSION["logged"]=true;

	    header("Location: index.php");
      echo "Benvenuto " . $email;
      exit();
    }
    else{
      $parameter = "Location: index.php?errore=password&password=$password";
      header($parameter);
    }
  }
  else
  {
    $parameter = "Location: index.php?errore=email&email=$email";
    header($parameter);
  }


?>

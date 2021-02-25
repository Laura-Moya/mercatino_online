<?php

include_once "db/connect.php";
include_once "common/funzioni.php";

$email = $_POST["email"];
$password = $_POST["password"];

$ris = checkMail($cid, $email);
if ($ris["status"] == "ok"){
  $ris2 = isUser($cid, $email, $password);
  if ($ris2["status"] == "ok") {
    session_start();
    $_SESSION["utente"] = $email;
    $_SESSION["logged"]=true;

    header("Location: index.php");
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

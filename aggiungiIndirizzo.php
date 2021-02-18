
    <?php
    session_start();

    include "common/header.php";
    include "db/connect.php";
    include "common/funzioni.php";

$nuovaVia = $_POST["nuovaVia"];
$nuovoComune = $_POST["nuovoComune"];
$nuovaRegione = $_POST["nuovaRegione"];
$nuovaProvincia = $_POST["nuovaProvincia"];

$res = newIndirizzo($cid, $nuovaVia, $nuovoComune, $nuovaRegione, $nuovaProvincia);

if ($res["status"] == "ok")
{
  $parameter = "Location: index.php?message=nuovoIndirizzoAggiunto";
  header($parameter);
}
else
{
    header("Location: index.php?errore=erroreDB");
}

?>

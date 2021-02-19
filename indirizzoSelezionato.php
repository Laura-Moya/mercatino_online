<?php
if(isset($_POST["indirizzo"])){
  $indirizzo = $_POST["indirizzo"];
  $result_explode = explode('|', $indirizzo);
  echo "via: ". $result_explode[0]."<br />";
  echo "comune: ". $result_explode[1]."<br />";
  echo "provicia: ". $result_explode[2]."<br />";
  echo "regione: ". $result_explode[3]."<br />";
  // header("Location: annunci.php?provincia:".$result_explode[2]);
} else {
  // header("Location: primopiano.php");
}
 ?>

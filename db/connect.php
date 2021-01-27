<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino_online';

$cid = new mysqli($hostname,$username,$password,$db);

if ($cid->connect_errno) {
  die('Errore connesione (' . $cid->connect_errno .')' . $cid->connect_error);
}
// else {
//   echo 'Connesso. ' . $cid->host_info . "\n";
// }

?>

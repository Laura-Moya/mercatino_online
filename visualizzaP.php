<?php

include_once "db/connect.php";
include_once "common/funzioni.php";


// $ris = leggiAnnunci($cid);
//
// if ($ris["status"] == "ko") {
//   header('location: ../annunci.php?status=ko&op=error&msg=' . urlencode($ris[1]));
// }
//
// else {
//   stampaAnnunci($ris);
// }

$ris = leggiAnnuncio($cid, 1);

if ($ris["status"] == "ko") {
  header('location: ../annunci.php?status=ko&op=error&msg=');
}
else {
  stampaAnnuncio($ris);
}

?>

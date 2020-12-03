<?php

include_once "db/connect.php";
include_once "common/funzioni.php";


$ris = leggiAnnunci($cid);
echo "---------------------------------------------";

if ($ris["status"] == "ko") {
  header('location: ../annunci.php?status=ko&op=error&msg=' . urlencode($ris[1]));
}

else {

  print_r ($ris);
  echo "---------------------------------------------";
}


stampaAnnunci($ris);
echo "---------------------------------------------";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      <script type="text/javascript" src="common/funzioni.js"></script>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    //Funzione annunciOsservati
    $risultato = prodottiAcquistati($cid, $codice_fiscale[0]);
    $prodotti = $risultato['contenuto'];
  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi acquisti</p>
    <div class="row">
      <?php
        for ($i=1; $i <= count($prodotti) ; $i++) {

            $prodotto = $prodotti[$i];
              echo '<div class="card" style="width: 16rem;">';
                echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title"> '. Ucwords($prodotto[1]) . ' </h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[2]) . '</p>';
                  echo '<a onclick="valuta($cid, $codicefiscaleValutato, $codicefiscaleValuta)" class="btn btn-primary">Valuta transizione</a>';
                echo '</div>';
              echo '</div>';
        }
      ?>
    </div>
  </div>


</body>
<!-- include "common/footer.php"; -->
</html>

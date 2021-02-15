<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    //Funzione annunciOsservati
    $risultato = annunciOsservati($cid, $codice_fiscale[0]);
    $annunciOsservati = $risultato['contenuto'];
  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi prodotti osservati</p>
    <div class="row">
      <?php
    
        for ($i=0; $i < count($annunciOsservati) ; $i++) {

            $prodotto = $annunciOsservati[$i];
              echo '<div class="card" style="width: 16rem;">';
                echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title"> '. Ucwords($prodotto[1]) . ' </h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[0]) . '</p>';
                  echo '<a href="prodotto.php" class="btn btn-primary">Non osservare più</a>';
                echo '</div>';
              echo '</div>';
        }
      ?>
    </div>
  </div>

  <script>

    function openForm() {
    document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }

  </script>
</body>
<!-- include "common/footer.php"; -->
</html>

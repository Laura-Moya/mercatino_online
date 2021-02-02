<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    //Funzione annunciOsservati
    $risultato = annunciOsservati($cid, 'MRNVNT96R63I577A');
    $annunciOsservati = $risultato['contenuto'];
  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">

      <?php
        echo '<p id="primo-piano">I tuoi prodotti osservati</p>';
        echo '<div class="row">';

        for ($i=0; $i < count($annunciOsservati) ; $i++) {
          $prodotto = $annunciOsservati[$i];
            echo '<div class="card" style="width: 16rem;">';
              echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
                echo '<h5 class="card-title"> '. $prodotto[0] . ' </h5>';
                echo '<p class="card-text">'. $prodotto[1] . '</p>';
                echo '<a href="#" class="btn btn-primary">'. $prodotto[2] . '</a>';
              echo '</div>';
            echo '</div>';

        }
          echo '</div>';
      ?>

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

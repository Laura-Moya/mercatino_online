<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    $risultato = inPrimoPiano($cid);
    $primoPiano = $risultato['contenuto'];

  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">
    <p id="primo-piano">I prodotti in primo piano</p>
    <div class="row">
      <?php
      for ($i=0; $i < count($primoPiano); $i++) {
        $prodotto = $primoPiano[$i];
        echo '<div class="card" style="width: 16rem;">';
          echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
            echo'<h5 class="card-title">'. Ucwords($prodotto[1]) .'</h5>';
            echo'<p class="card-text">'. Ucwords($prodotto[0]) .'</p>';
            echo'<a href="prodotto.php" class="btn btn-primary">Visualizza!</a>';
            echo'<a href="prodotto.php" style="margin-left: 0.5rem;" class="btn btn-primary"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i>Osserva</a>';
        echo'  </div>';
        echo'</div>';
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

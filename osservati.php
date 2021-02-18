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

    if (isset($_GET['nonosservare'])) {
      echo '<script type="text/javascript">alert("Annuncio rimosso dai tuoi prodotti osservati");</script>';
    }
  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi prodotti osservati</p>
    <div class="row">
      <?php

        for ($i=0; $i < count($annunciOsservati) ; $i++) {

            $prodotto = $annunciOsservati[$i];?>
              <div class="card" style="width: 16rem;">
                <img src="images/fornellino.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                  <h5 class="card-title"><a href="prodotto.php?codice=<?php echo $prodotto[2]; ?>"> <?php echo Ucwords($prodotto[1]); ?> </a></h5>
                  <p class="card-text"><?php echo Ucwords($prodotto[0]); ?></p>
                  <a href="nonOsservare.php?codice=<?php echo $prodotto[2]; ?>&codicefiscale=<?php echo $codice_fiscale[0];?>" class="btn btn-primary">Non osservare più</a>
                </div>
              </div>
      <?php  }
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

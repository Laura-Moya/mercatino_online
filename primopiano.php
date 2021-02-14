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
        $prodotto = $primoPiano[$i];?>
        <form action="prodotto.php" method="get">
          <div class="card" style="width: 16rem;">
           <img src="images/fornellino.jpg" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title"> <?php echo Ucwords("$prodotto[1]"); ?> </h5>
             <p class="card-text"> <?php echo Ucwords("$prodotto[0]"); ?> </p>
             <a href="prodotto.php?codice= <?php echo "$prodotto[2]"; ?>" class="btn btn-primary">Visualizza!</a>
             <a href="prodotto.php" style="margin-left: 0.5rem;" class="btn btn-primary"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i>Osserva</a>
           </div>
          </div>
        </form>


      <?php } ?>


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

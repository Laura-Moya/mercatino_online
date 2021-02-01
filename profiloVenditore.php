
    <?php include 'common/profilo.php'; ?>

    <?php

      //Funzione leggiProdottiVenduti
      $risultato = leggiProdottiVenduti($cid, 'MYGLRA99P60Z131O');
      $prodottiVenduti = $risultato['contenuto'];

      //Funzione leggiProdottiInVendita
      $risultato = leggiProdottiInVendita($cid, 'MYGLRA99P60Z131O');
      $prodottiInVendita = $risultato['contenuto'];

     ?>

          <p class="prodotti-venduti-profilo"><a href="#">Prodotti venduti</a> <?php echo "$prodottiVenduti[0]"; ?> </p>
          <p class="prodotti-in-vendita-profilo"><a href="#">Prodotti in vendita</a> <?php echo "$prodottiInVendita[0]"; ?>  </p>
          <button class="btn btn-primary" type="button" onclick="location.href='creareAnnuncio.php'"><i class="fas fa-plus" id="piu"></i> Aggiungi annuncio </button>
        </div>
      </div>
    </div>


    <!-- Link a gli annunci più osservati -->

    <!-- Annunci in vendita -->
    <div class="container">
      <p id="primo-piano">I più osservati</p>
      <div class="row">
        <div class="card" style="width: 16rem;">
          <img src="images/fornellino.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 16rem;">
          <img src="images/fornellino.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 16rem;">
          <img src="images/fornellino.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 16rem;">
          <img src="images/fornellino.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

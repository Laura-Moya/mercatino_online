
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

    <!-- Annunci osservati -->
    <?php include 'common/osservati.php'; ?>

  </body>

  <!-- include "common/footer.php"; -->
</html>

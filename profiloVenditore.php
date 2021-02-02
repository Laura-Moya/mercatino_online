
    <?php include 'common/profilo.php'; ?>

    <?php

      //Funzione leggiProdottiVenduti
      $risultato = leggiProdottiVenduti($cid, $codice_fiscale[0]);
      $prodottiVenduti = $risultato['contenuto'];

      //Funzione leggiProdottiInVendita
      $risultato = leggiProdottiInVendita($cid, $codice_fiscale[0]);
      $prodottiInVendita = $risultato['contenuto'];

     ?>

          <p class="prodotti-venduti-profilo"><a href="#">Prodotti venduti</a> <?php echo "$prodottiVenduti[0]"; ?> </p>
          <p class="prodotti-in-vendita-profilo"><a href="#">Prodotti in vendita</a> <?php echo "$prodottiInVendita[0]"; ?>  </p>
          <button class="btn btn-primary" type="button" onclick="location.href='creareAnnuncio.php'"><i class="fas fa-plus" id="piu"></i> Aggiungi annuncio </button>
        </div>
      </div>
    </div>

    <!-- Annunci osservati -->
    <?php include 'common/piuOsservati.php'; ?>

  </body>

  <!-- include "common/footer.php"; -->
</html>

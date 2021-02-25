
    <?php include '../common/profilo.php'; ?>

    <?php

      //Funzione leggiProdottiVenduti
      $risultato = leggiProdottiVenduti($cid, $codice_fiscale[0]);
      $prodottiVenduti = $risultato['contenuto'];

      //Funzione leggiProdottiInVendita
      $risultato = leggiProdottiInVendita($cid, $codice_fiscale[0]);
      $prodottiInVendita = $risultato['contenuto'];

      //Funzione leggiProdottiEliminati
      $risultato = leggiProdottiEliminati($cid, $codice_fiscale[0]);
      $prodottiEliminati = $risultato['contenuto'];

      if (isset($_GET['eliminato'])) {
        echo '<script type="text/javascript">alert("Il tuo annuncio è stato eliminato con successo");</script>';
      }
      if (isset($_GET['invendita'])) {
        echo '<script type="text/javascript">alert("Il tuo annuncio è stato rimesso in vendita con successo");</script>';
      }

     ?>

          <p class="prodotti-venduti-profilo"><a href="prodottiVenduti.php">Prodotti venduti:</a> <?php echo "$prodottiVenduti[0]"; ?> </p>
          <p class="prodotti-in-vendita-profilo"><a href="prodottiInVendita.php">Prodotti in vendita:</a> <?php echo "$prodottiInVendita[0]"; ?>  </p>
          <p class="prodotti-in-vendita-profilo"><a href="prodottiEliminati.php">Prodotti eliminati:</a> <?php echo "$prodottiEliminati[0]"; ?>  </p>
          <button class="btn btn-primary" type="button" onclick="location.href='../backend/creareAnnuncio.php'"><i class="fas fa-plus" id="piu"></i> Aggiungi annuncio </button>
        </div>
      </div>
    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

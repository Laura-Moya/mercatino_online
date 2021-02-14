<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>

    <?php include "common/navbar.php";?>

    <?php
      $codice = mysqli_real_escape_string($cid, $_GET['codice']);

      $risultato = leggiAnnuncio($cid, $codice);
      $prodotto = $risultato['contenuto'];
      $risultato = contaOsservatori($cid, $codice);
      $osservatori = $risultato['contenuto'];

    ?>

      <div class="container-profilo container">
        <div class="row">
          <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
            <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
          </div>
          <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
            <h1>Valuta transazione</h1>
            <h4 class="nome-annuncio"> <?php echo Ucwords("$prodotto[0]"); ?> </h4>
            <h4 class="nome-prodotto" style="margin-top: 1rem;"> <?php echo Ucwords("$prodotto[1]"); ?> </h4>

            <form action='valuta.php' method='POST'>

              <label ><b>Puntalità</b></label><br/>
              <div class="valuta-popup">
                <select class="form-control form-control-sm" required>
                  <option name="puntualita" value="1">1</option>
                  <option name="puntualita" value="2">2</option>
                  <option name="puntualita" value="3">3</option>
                  <option name="puntualita" value="4">4</option>
                  <option name="puntualita" value="5">5</option>
                </select>
              </div>

              <label for='psw'><b>Serietà</b></label> <br/>
              <div class="valuta-popup">
                <select class="form-control form-control-sm"  required>
                  <option name="serieta" value="1">1</option>
                  <option name="serieta" value="2">2</option>
                  <option name="serieta" value="3">3</option>
                  <option name="serieta" value="4">4</option>
                  <option name="serieta" value="5">5</option>
                </select>
              </div>
              <button type='submit' class='btn btn-primary btn-login'>
                <a href="valuta.php?codiceFiscaleValuta=<?php echo $codice_fiscale[0];?>&codiceFiscaleValutato=<?php echo $prodotto[12];?>&serieta=<?php echo $serita; ?>&puntualita=<?php echo $puntualita; ?>"></a> Valuta
              </button>
              <button type='button' class='btn btn-primary btn-login'>Torna ai tuoi acquisti</button>
            </form>

          </div>
        </div>
      </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

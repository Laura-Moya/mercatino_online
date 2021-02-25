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
            <img src="<?php echo $prodotto["17"]; ?>" style="width: 100%;" alt="immagine_profilo">
          </div>
          <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
            <h1>Valuta transazione</h1>
            <h4 class="nome-annuncio"> <?php echo Ucwords("$prodotto[0]"); ?> </h4>
            <h4 class="nome-prodotto" style="margin-top: 1rem;"> <?php echo Ucwords("$prodotto[1]"); ?> </h4>

            <form action='valuta.php?codiceFiscaleValutato=<?php echo "$prodotto[12]";?>&codicefiscalevaluta=<?php echo "$codice_fiscale[0]"; ?>&acquirente=<?php echo "$prodotto[18]";?>' method='POST'>

              <label ><b>Puntalità</b></label><br/>
              <select class="form-control form-control-sm" name="puntualita" id="puntualita" style="width: 15% !important;" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

              <label for='psw'><b>Serietà</b></label> <br/>
              <select class="form-control form-control-sm" name="serieta" id="serieta" style="width: 15% !important;" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

              <button type='button' class='btn btn-primary btn-login'> <a style="color: white !important;" href="prodottiAcquistati.php">Torna ai tuoi acquisti</a></button>

              <button type='submit' class='btn btn-primary btn-login'>Valuta</button>
            </form>

          </div>
        </div>
      </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

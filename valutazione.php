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

            <form action='valuta.php' method='GET'>

              <label ><b>Puntalità</b></label><br/>
              <div class="">
                <select class="form-control form-control-sm" name="puntualita" style="width: 15% !important;" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>

              <label for='psw'><b>Serietà</b></label> <br/>
              <div class="">
                <select class="form-control form-control-sm" name="serieta" style="width: 15% !important;" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>


              <button type='button' class='btn btn-primary btn-login'> <a style="color: white !important;" href="prodottiAcquistati.php">Torna ai tuoi acquisti</a></button>

              <button type='submit' class='btn btn-primary btn-login'>
                <a style="color: white !important;" href="valuta.php?codiceFiscaleValuta=<?php echo "$codice_fiscale[0]";?>&codiceFiscaleValutato=<?php echo "$prodotto[12]";?>&serieta=<?php echo $_GET["serieta"] ?>">Valuta</a>
              </button>
            </form>
            <?php
            echo "$codice_fiscale[0] </br>";
            echo "$prodotto[12] </br>";
        ?>
          </div>
        </div>
      </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

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
    <form class="" action="osserva.php" method="get">
      <div class="container-profilo container">
        <div class="row">
          <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
            <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
          </div>
          <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
            <h1 class="nome-annuncio"> <?php echo Ucwords("$prodotto[0]"); ?> </h1>
            <a> Questo prodotto è osservato da <?php echo "$osservatori[0]"; ?> persone! </a>
            <p class="nome-prodotto" style="margin-top: 1rem;"> <?php echo Ucwords("$prodotto[1]"); ?> </p>
            <h2>Prezzo: € <?php echo "$prodotto[2]"; ?> </h2>
            <p>Venditore: <?php echo Ucwords("$prodotto[3]") . Ucwords(" $prodotto[4]"); ?></p>
            <p>Regione: <?php echo Ucwords("$prodotto[5]"); ?></p>
            <p>Comune: <?php echo Ucwords("$prodotto[6]"); ?></p>
            <p>Stato: <?php echo Ucwords("$prodotto[7]"); ?></p>
            <p>Categoria: <?php echo "$prodotto[8]"; ?></p>
            <p>Sottocategoria: <?php echo "$prodotto[9]"; ?></p>
            <p>Nuovo: <?php $ris = $prodotto[10]==1 ? "Si" : "No"; echo "$ris"; ?></p>
            <?php
            if ($ris=="Si"){
              echo '<p>Garanzia: '. $res = $prodotto[13]==1 ? "Si" : "No".'</p>';
              if ($res=="Si"){
                echo '<p>Tempo garanzia: '. Ucwords("$prodotto[14]").'</p>';
              }
            } else {
              echo '<p>Stato usura: '. Ucwords("$prodotto[15]").'</p>';
              echo '<p>Tempo usura: '.  Ucwords("$prodotto[16]").'</p>';
            }

             ?>
            <button class="btn btn-primary" type="button" onclick="location.href='pagamento.php?codice=<?php echo "$codice" ;?>'">Acquista ora</button>
            <button class="btn btn-primary" type="button"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i><a style="color: white !important;" href="osserva.php?codice=<?php echo $codice ?>&codicefiscale=<?php echo $codice_fiscale[0];?>">Osserva</a> </button>

          </div>
        </div>
      </div>

    </form>

  </body>

  <!-- include "common/footer.php"; -->
</html>

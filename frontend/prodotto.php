<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
  <body>

    <?php include "../common/navbar.php";
    if (!isset($_SESSION['utente'])){
      include "../common/jumbotron.php";
    }
    ?>

    <?php
      $codice = mysqli_real_escape_string($cid, $_GET['codice']);

      $risultato = leggiAnnuncio($cid, $codice);
      $prodotto = $risultato['contenuto'];
      $risultato = contaOsservatori($cid, $codice);
      $osservatori = $risultato['contenuto'];
      if (isset($_SESSION["utente"])){
      $risultato = prodottoOsservato($cid,$codice_fiscale[0], $codice);
      $osservato = $risultato['contenuto'];
      }
    ?>
    <div class='form-popup3 container-registrazione' id='stati' >
      <div class="">
        <h4>Stati del prodotto:</h4>
        <div class="" style="padding-bottom: 1rem;">

        <?php
        $sql="SELECT * FROM `stato` WHERE stato.prodotto = '$codice' ORDER By stato.data_ora";
        $data = mysqli_query($cid, $sql);

        while ($row=$data->fetch_row()) {
          echo Ucwords($row[1])." </br>";
        }
        ?>
      </div>
    </div>


        <button type='submit' class='btn btn-primary btn-login'> <a style="color: white !important;" onclick="closeForm()">OK </a></button>
        <button type='button' class='btn btn-primary btn-login' onclick='closeStati()'>Chiudi</button>
      </div>

    <form class="" action="../backend/osserva.php" method="get">
      <div class="container-profilo container">
        <div class="row">
          <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
            <img src="<?php echo $prodotto["17"]; ?>" style="width: 100%;" alt="immagine_profilo">
          </div>
          <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
            <h1 class="nome-annuncio"> <?php echo Ucwords("$prodotto[0]"); ?> </h1>
            <a> Questo prodotto è osservato da <?php echo "$osservatori[0]"; ?> persone! </a>
            <p class="nome-prodotto" style="margin-top: 1rem;"> <?php echo Ucwords("$prodotto[1]"); ?> </p>
            <h2>Prezzo: € <?php echo "$prodotto[2]"; ?> </h2>
            <p>Venditore: <?php echo Ucwords("$prodotto[3]") . Ucwords(" $prodotto[4]"); ?></p>
            <p>Regione: <?php echo Ucwords("$prodotto[5]"); ?></p>
            <p>Comune: <?php echo Ucwords("$prodotto[6]"); ?></p>
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
            if (isset($_SESSION["utente"])){
              if ($prodotto[12]==$codice_fiscale[0]){
                echo '<a class="btn btn-primary" onclick="openStati()">Visualizza stati del prodotto</a>';

              } else {?>
                <button class="btn btn-primary" type="button" onclick="location.href='pagamento.php?codice=<?php echo "$codice" ;?>'">Acquista ora</button>
                <?php if ($osservato == 1) {
                  echo '<a href="../backend/nonOsservare.php?codice='. $codice .'&codicefiscale='.$codice_fiscale[0].'&prodotto=on" class="btn btn-primary">Non osservare più</a>';
                } else {?>
                <button class="btn btn-primary" type="button"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i><a style="color: white !important;" href="../backend/osserva.php?codice=<?php echo $codice ?>&codicefiscale=<?php echo $codice_fiscale[0];?>">Osserva</a> </button>
              <?php
            }
          }
        } else {
          echo '<a href="registrazione.php"> Per poter comprare questo prodotto devi prima registrarti!</a>';
        }
            ?>

          </div>
        </div>
      </div>
    </form>
<script>
    function openForm() {

      document.getElementById("stati").style.display = "block";
    }

    function closeForm() {
      document.getElementById("stati").style.display = "none";
    }
    function openStati() {

      document.getElementById("stati").style.display = "block";
    }

    function closeStati() {
      document.getElementById("stati").style.display = "none";
    }
  </script>

  </body>

  <!-- include "common/footer.php"; -->
</html>

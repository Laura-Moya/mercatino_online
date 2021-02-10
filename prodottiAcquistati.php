<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      <script type="text/javascript" src="common/funzioni.js"></script>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    //Funzione annunciOsservati
    $risultato = prodottiAcquistati($cid, $codice_fiscale[0]);
    $prodotti = $risultato['contenuto'];
  ?>

  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi acquisti</p>
    <div class="row">
      <?php
        for ($i=1; $i <= count($prodotti) ; $i++) {

            $prodotto = $prodotti[$i];
              echo '<div class="card" style="width: 16rem;">';
                echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title"> '. Ucwords($prodotto[1]) . ' </h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[2]) . '</p>';
                  echo '<a onclick="openForm()" class="btn btn-primary">Valuta transizione</a>';

                echo '</div>';
              echo '</div>';
        }
      ?>
      <div class='form-popup container-registrazione' id='valuta'>
      <form action='<?php valuta_php($cid, $codicefiscaleValutato, $codice_fiscale[0], $serieta, $puntualita); ?>' method='POST'>
      <h4>Valuta transazione</h4>
      <label ><b>Puntalità</b></label><br/>
      <div class="valuta-popup">
        <select class="form-control form-control-sm" required>
          <option value="">Seleziona... </option>
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
          <option value="">Seleziona... </option>
          <option name="serieta" value="1">1</option>
          <option name="serieta" value="2">2</option>
          <option name="serieta" value="3">3</option>
          <option name="serieta" value="4">4</option>
          <option name="serieta" value="5">5</option>
        </select>
      </div>
      <button type='submit' class='btn btn-primary btn-login'>Valuta</button>
      <button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>
      </form>
      </div>
    </div>
  </div>
  <script>
    function openForm() {
      document.getElementById("valuta").style.display = "block";
    }

    function closeForm() {
      document.getElementById("valuta").style.display = "none";
    }
  </script>

</body>

<!-- include "common/footer.php"; -->
</html>

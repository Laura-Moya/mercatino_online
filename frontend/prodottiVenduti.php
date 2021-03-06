<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
      <script type="text/javascript" src="../common/funzioni.js"></script>
  </head>
<body onload="load()">
  <?php include "../common/navbar.php";
  if (!isset($_SESSION['utente'])){
    include "../common/jumbotron.php";
  }
  ?>
  <?php

    //Funzione annunciOsservati
    $risultato = prodottiVenduti($cid, $codice_fiscale[0]);
    $prodotti = $risultato['contenuto'];


  ?>
  <!-- popup stati -->
  <div class='form-popup3 container-registrazione' id='stati' >
    <div class="" >
      <h4>Stati del prodotto:</h4>
      <div class="" style="padding-bottom: 1rem;">

      <?php
      $codice = $_GET['codice'];
      $sql="SELECT * FROM `stato` WHERE stato.prodotto = '$codice' ORDER By stato.data_ora";
      $data = mysqli_query($cid, $sql);

      while ($row=$data->fetch_row()) {
        echo Ucwords($row[1])." </br>";
      }
      ?>
    </div>

      <button type='submit' class='btn btn-primary btn-login'> <a style="color: white !important;" href="#">OK </a></button>
      <button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>
    </div>


  </div>
  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi annunci venduti</p>
    <div class="row">

      <?php
        for ($i=0; $i < count($prodotti) ; $i++) {

            $prodotto = $prodotti[$i];
              echo '<div class="card" style="width: 16rem; margin-top:0px !important;">';
                echo '<img src="'. $prodotto[4] .'" style="height: 10rem; width: revert;"  class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<form class="" action="../backend/stati.php" method="get">';
                  echo '<h5 class="card-title"><a href="prodotto.php?codice='. $prodotto[2].'"> '. Ucwords($prodotto[0]) . ' </a></h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[1]) . '</p>';
                  echo '<a href="../backend/stati.php?stato=venduto&codice='. $prodotto[2].'" class="btn btn-primary" >Visualizza stati del prodotto</a>';
                  echo '</form>';
                  echo '<form class="" action="valutazione.php" method="get">';
                  echo '<a href="valutazione.php?codice='. $prodotto[2].'" class="btn btn-primary" style="margin: 1rem 2.1rem;">Valuta transizione</a>';
                  echo '</form>';
                  echo '<form class="" action="rimettiInVendita.php " method="get">';
                  echo '<a style="margin: 0rem 2.1rem;" href="../backend/rimettiInVendita.php?codice='. $prodotto[2].'" class="btn btn-primary" >Rimetti in vendita!</a>';
                  echo '</form>';
                echo '</div>';
              echo '</div>';
        }
      ?>

    </div>
  </div>
  <script>
  function load(){
    if ((document.referrer.match("http://localhost/mercatino_online/frontend/prodottiVenduti.php?"))!= null){
      openForm();
    }

  }

    function openForm() {

      document.getElementById("stati").style.display = "block";
    }

    function closeForm() {
      document.getElementById("stati").style.display = "none";
    }
  </script>

</body>

<!-- include "common/footer.php"; -->
</html>

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
    $risultato = prodottiInVendita($cid, $codice_fiscale[0]);
    $prodotti = $risultato['contenuto'];

    if (isset($_GET['nuovoannuncio'])) {
        echo '<script type="text/javascript">alert("Il tuo prodotto è ora in vendita!");</script>';
    }
  ?>
  <!-- popup stati -->
  <div class='form-popup3 container-registrazione' id='stati' >
    <div class="">
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

      <button type='submit' class='btn btn-primary btn-login'> <a style="color: white !important;" onclick="closeForm()">OK </a></button>
      <button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>
    </div>


  </div>
  <!-- I miei prodotti osservati -->
  <div class="container">
  <p id="primo-piano">I tuoi annunci in vendita</p>
    <div class="row">

      <?php
        for ($i=0; $i < count($prodotti) ; $i++) {

            $prodotto = $prodotti[$i];
              echo '<div class="card" style="width: 16rem; margin-top:0px !important;">';
                echo '<img src="'. $prodotto[6] .'" style="height: 10rem; width: revert;" class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<form class="" action="../backend/stati.php " method="get">';
                  echo '<h5 class="card-title"><a href="prodotto.php?codice='. $prodotto[2].'"> '. Ucwords($prodotto[0]) . ' </a></h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[1]) . '</p>';
                  echo '<a href="../backend/stati.php?stato=invendita&codice='. $prodotto[2].'" class="btn btn-primary" >Visualizza stati del prodotto</a>';
                  echo '</form>';
                  echo '<form class="" action="../backend/eliminaAnnuncio.php " method="get">';
                  echo '<a style="margin: 1rem 2.1rem; background-color: red !important; " href="../backend/eliminaAnnuncio.php?codice='. $prodotto[2].'" class="btn btn-primary" >Elimina annuncio</a>';
                  echo '</form>';
                echo '</div>';
              echo '</div>';
        }
      ?>

    </div>
  </div>
  <script>
  function load(){
    if ((document.referrer.match("http://localhost/mercatino_online/frontend/prodottiInVendita.php?"))!= null){
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

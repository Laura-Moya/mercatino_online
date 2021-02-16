<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      <script type="text/javascript" src="common/funzioni.js"></script>
  </head>
<body onload="load()">
  <?php include "common/navbar.php";?>
  <?php

    //Funzione annunciOsservati
    $risultato = prodottiEliminati($cid, $codice_fiscale[0]);
    $prodotti = $risultato['contenuto'];


  ?>
  <!-- popup stati -->
  <div class='form-popup3 container-registrazione' id='stati' >
    <div class="" style="padding: 50% 0;">
      <h4>Stati del prodotto:</h4>
      <div class="" style="padding-bottom: 1rem;">

      <?php
      $codice = $_GET['codice'];
      $sql="SELECT * FROM `stato` WHERE stato.prodotto = '$codice'";
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
  <p id="primo-piano">I tuoi annunci eliminati</p>
    <div class="row">

      <?php
        for ($i=0; $i < count($prodotti) ; $i++) {

            $prodotto = $prodotti[$i];
              echo '<div class="card" style="width: 16rem;">';
                echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
                  echo '<div class="card-body">';
                  echo '<form class="" action="stati.php" method="get">';
                  echo '<h5 class="card-title"><a href="prodotto.php?codice='. $prodotto[2].'"> '. Ucwords($prodotto[0]) . ' </a></h5>';
                  echo '<p class="card-text">'. Ucwords($prodotto[1]) . '</p>';
                  echo '<a href="stati.php?stato=eliminato&codice='. $prodotto[2].'" class="btn btn-primary" >Visualizza stati del prodotto</a>';
                  echo '</form>';
                echo '</div>';
              echo '</div>';
        }
      ?>

    </div>
  </div>
  <script>
  function load(){
    if ((document.referrer.match("http://localhost/mercatino_online/prodottiEliminati.php?"))!= null){
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

<?php
include "db/connect.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
<body>
  <?php include "common/navbar.php";?>
  <?php

    $risultato = inPrimoPiano($cid);
    $primoPiano = $risultato['contenuto'];

    if (isset($_GET['Message'])) {
    echo '<script type="text/javascript">alert("Benvenuto nel tuo mercatino online! La tua registrazione è andata a buon fine, buono shopping!");</script>';

    }
  ?>

  <div class="session">
  </div>
  <!-- Navbar con i filtri -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="categorie">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown terzo">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Stato
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Nuovo</a>
            <a class="dropdown-item" href="#">Usato</a>
          </div>
        </li>
        <li class="nav-item dropdown terzo">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Prezzo
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">€ 0 - 20 </a>
            <a class="dropdown-item" href="#">€ 20 - 50</a>
            <a class="dropdown-item" href="#">€ 50 - 100</a>
            <a class="dropdown-item" href="#">€ 100 - ∞</a>
          </div>
        </li>
        <li class="nav-item dropdown terzo">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Valutazione
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              Più di
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </a>
            <a class="dropdown-item" href="#">
              Più di
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </a>
            <a class="dropdown-item" href="#">
              Più di
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </a>
            <a class="dropdown-item" href="#">
              Più di
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown terzo">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Luogo
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Nella mia provincia</a>
            <a class="dropdown-item" href="#">Nella mia regione</a>
          </div>
        </li>
      </ul>
    </div>

  </nav>
  <!-- Linea di Divisione -->
  <div class="linea"></div>
  <!-- Top 4 più osservati -->
  <div class="container">
    <!-- Link a gli annunci più osservati -->
    <p id="primo-piano"><a href="primopiano.php">In primo piano</a></p>

    <div class="row">
      <?php
      for ($i=0; $i < 4; $i++) {
        $prodotto = $primoPiano[$i];
        echo '<div class="card" style="width: 16rem;">';
          echo '<img src="images/fornellino.jpg" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
            echo'<h5 class="card-title">'. Ucwords($prodotto[1]) .'</h5>';
            echo'<p class="card-text">'. Ucwords($prodotto[0]) .'</p>';
            echo'<a href="prodotto.php" class="btn btn-primary">Visualizza!</a>';
            echo'<a href="prodotto.php" style="margin-left: 0.5rem;" class="btn btn-primary"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i>Osserva</a>';
        echo'  </div>';
        echo'</div>';
      }

      ?>


    </div>
  </div>
  <!-- Sottocategorie Random -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/abbigliamento.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/giocattoli.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/macchina2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/tv.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</body>
<!-- include "common/footer.php"; -->
</html>

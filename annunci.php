<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>
      <?php include "common/navbar.php";?>

      <?php

        $risultato = leggiAnnunci($cid);
        $annunci = $risultato['contenuto'];

      ?>

      <div class="container-filtri-annunci">

      <!-- Navbar Sottocategorie -->
      <nav class="navbar bg-light" id="sottocategorie">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Aspirapolveri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Caffetiere</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tostapane</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Frullatori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Altro</a>
          </li>
        </ul>
      </nav>

      <!-- Elenco annunci -->
        <div class='annunci'>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/cellulare.jpg" class="card-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h2 class="card-title"> <a href="prodotto.php">PC nuovo Lenovo</a> </h2>
                <p class="card-text">Si vende PC nuovo.</p>
                <p class="card-text">Provenienza: BO</p>
                <p class="card-text">Prezzo: € 700 </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <button class="btn btn-primary" type="button"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>
              </div>
            </div>
          </div>
        </div>
        </div>

        <!-- Navbar filtri -->
        <nav class="navbar bg-light" id="sottocategorie">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stato
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Nuovo</a>
                <a class="dropdown-item" href="#">Usato</a>
              </div>
            </li>
            <li class="nav-item">
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
            <li class="nav-item">
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
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Luogo
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Nella mia provincia</a>
                <a class="dropdown-item" href="#">Nella mia regione</a>
              </div>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ordina per</a>
            </li>
          </ul>
        </nav>

        <div class='annunci'>
        <?php
          for ($i=1; $i < count($annunci) ; $i++) {
            $prodotto = $annunci[$i];
              echo '<div class="card mb-3" id="annunci" style="max-width: 770px;">';
              echo '<div class="row no-gutters">';
                echo '<div class="col-md-4">';
                  echo '<img src="images/cellulare.jpg" class="card-img">';
                echo '</div>';
                echo '<div class="col-md-8">';
                  echo '<div class="card-body">';
                    echo '<h2 class="card-title"> <a href="prodotto.php">' . Ucwords($prodotto[4]) . '</a></h2>';
                    echo '<p class="card-text">' . Ucwords($prodotto[3]) . '</p>';
                    echo '<p class="card-text">Provenienza: ' . mb_strtoupper($prodotto[10]) . ' </p>';
                    echo '<h4 class="card-text" style="color: #824f93 !important;">Prezzo: <b>€ ' . $prodotto[6] . '</b></h4>';
                    echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
                    echo'<button class="btn btn-primary" type="button" onclick="'?>
                    <?php osservare($cid,$prodotto[0],$codicefiscale[0]);?>
                    <?php echo'"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>';
                    echo '<i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>';

                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          }
        ?>

        </div>

onclick ="osservare($cid,  $prodotto[0], $cod)">



    </div>


  </body>

  <!-- include "common/footer.php"; -->
</html>

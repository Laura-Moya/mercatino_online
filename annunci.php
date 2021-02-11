<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>
      <?php include "common/navbar.php";?>

      <?php
        // $res = noFilter($cid);
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
            <a class="nav-link" href="#">Caffettiere</a>
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
            <form id="stato" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Stato</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#" onclick="">Nuovo</a>
                  <a class="dropdown-item" href="#" onclick="">Usato</a>
                </div>
              </li>
            </form>
            <form id="prezzo" action="annunci.php" method="post">
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
            </form>
            <form id="val" action="annunci.php" method="post">
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
            </form>
            <form id="luogo" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Luogo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Nella mia provincia</a>
                  <a class="dropdown-item" href="#">Nella mia regione</a>
                </div>
              </li>
            </form>
            <form class="ordina" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link" href="#">Ordina per</a>
              </li>
            </form>

          </ul>
        </nav>

        <div class='annunci'>
        <?php
          for ($i=1; $i < count($annunci) ; $i++) {
            $prodotto = $annunci[$i];
            $codiceProdotto = $prodotto[0];
            ?>
              <div class="card mb-3" id="annunci" style="max-width: 770px;">
              <div class="row no-gutters">
              <div class="col-md-4">
                  <img src="images/cellulare.jpg" class="card-img">
              </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h2 class="card-title"> <a href="prodotto.php?codiceProdotto='.prodotto[0].'"><?php echo Ucwords("$prodotto[4]")  ?></a></h2>
                    <p class="card-text"> <?php echo Ucwords("$prodotto[3]") ?></p>
                    <p class="card-text">Provenienza: <?php echo mb_strtoupper("$prodotto[10]") ?> </p>
                    <h4 class="card-text" style="color: #824f93 !important;">Prezzo: <b>€ <?php echo "$prodotto[6]" ?> </b></h4>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <button class="btn btn-primary" type="button" onclick="
                    <?php osservare($cid,$prodotto[0],$codice_fiscale[0]);?>"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>
                  </div>
                </div>
              </div>
              </div>
          <?php } ?>
        </div>

    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

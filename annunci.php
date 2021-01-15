<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>
      <?php include "common/navbar.php";?>

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
      <div class="annunci">
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/cellulare.jpg" class="card-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> <a href="prodotto.php">Cellulare nuovo Samsung Svy192</a> </h5>
                <p class="card-text">Si vende cellulare usato.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/fornellino.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/fornellino.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/fornellino.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/fornellino.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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

    </div>


  </body>

  <!-- include "common/footer.php"; -->
</html>

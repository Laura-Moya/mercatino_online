<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include "common/header.php";?>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-light" id="prima_navbar">
    <a class="navbar-brand" href="#">Mercatino</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Search bar -->
      <div class="search-bar">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-eye fa-lg icon-eye"></i></a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- Indirizzo e Categorie -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="btn btn-primary" type="button" name="button"><i class="fas fa-map-marker" style="margin-right: 0.7rem;"></i>Indirizzo</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent1">

      <ul class="navbar-nav">
        <li class="nav-item second">
          <a class="nav-link" href="#">Elettrodomestici</a>
        </li>
        <li class="nav-item second">
          <a class="nav-link" href="#">Hobby</a>
        </li>
        <li class="nav-item second">
          <a class="nav-link" href="#">Foto e Video</a>
        </li>
        <li class="nav-item second">
          <a class="nav-link" href="#">Abbigliamento</a>
        </li>
      </ul>



    </div>

  </nav>
  <!-- Linea di Divisione -->
  <div class="linea"></div>
  <!-- Navbar con i filtri -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="categorie">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown second">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Stato
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Nuovo</a>
            <a class="dropdown-item" href="#">Usato</a>
          </div>
        </li>
        <li class="nav-item dropdown second">
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
        <li class="nav-item dropdown second">
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
        <li class="nav-item dropdown second">
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
  <!-- Link a gli annunci più osservati -->
  <p id="primo-piano"><a href="#">In primo piano</a></p>
  <!-- Top 6 osservati -->
  <div class="container">
    <div class="row">
      <div class="card" style="width: 16rem;">
        <img src="images/fornellino.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 16rem;">
        <img src="images/fornellino.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 16rem;">
        <img src="images/fornellino.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 16rem;">
        <img src="images/fornellino.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
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
        <img src="images/macchina.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/tv.webp" class="d-block w-100" alt="...">
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


<!-- include "common/footer.php"; -->

</body>

</html>

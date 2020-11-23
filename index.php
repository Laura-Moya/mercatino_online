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
  <nav class="navbar navbar-expand-sm navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent2">

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Estado
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label"><a class="dropdown-item" href="#">Nuevo</a></label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label"><a class="dropdown-item" href="#">Usato</a></label>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>

    </div>
  </nav>
  <footer>All rights reserved 2020 Mercatino Online</footer>
</body>

</html>

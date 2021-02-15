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
      <?php
          $sottocategorie = array();
          $sottocategorie['elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altro1'];
          $sottocategorie['fotoevideo'] = ['Macchine fotografiche', 'Accessori', 'Telecamere', 'Microfoni', 'Altro2'];
          $sottocategorie['abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro3'];
          $sottocategorie['hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro4'];

          if (isset($_GET['cat'])){
              if ($_GET['cat']== 'elettrodomestici'){?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                  <?php
                for ($i=0; $i < count($sottocategorie['elettrodomestici']) ; $i++) {
                  $sotcat = $sottocategorie['elettrodomestici'];?>
                  <li class="nav-item">
                    <a class="nav-link" href="annunci.php?cat=elettrodomestici&sottocat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
                  </li>
                <?php
                }
              }
              if ($_GET['cat']== 'fotoevideo'){?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                  <?php
                for ($i=0; $i < count($sottocategorie['fotoevideo']) ; $i++) {
                  $sotcat = $sottocategorie['fotoevideo'];?>
                  <li class="nav-item">
                    <a class="nav-link" href="annunci.php?cat=fotoevideo&sottocat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
                  </li>
                <?php
                }
              }
              if ($_GET['cat']== 'abbigliamento'){?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                  <?php
                for ($i=0; $i < count($sottocategorie['abbigliamento']) ; $i++) {
                  $sotcat = $sottocategorie['abbigliamento'];?>
                  <li class="nav-item">
                    <a class="nav-link" href="annunci.php?cat=abbigliamento&sottocat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
                  </li>
                <?php
                }
              }
              if ($_GET['cat']== 'hobby'){?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                  <?php
                for ($i=0; $i < count($sottocategorie['hobby']) ; $i++) {
                  $sotcat = $sottocategorie['hobby'];?>
                  <li class="nav-item">
                    <a class="nav-link" href="annunci.php?cat=hobby&sottocat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
                  </li>
                <?php
                }
              }

              ?></ul>
            </nav><?php
            }
      ?>
      <!-- <nav class="navbar bg-light" id="sottocategorie">
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
      </nav> -->

      <!-- Elenco annunci -->
        <div class='annunci' style = "visibility: hidden;">
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
            if (isset($_POST['submit-search2'])){
              $search = mysqli_real_escape_string($cid,$_POST['search2']);
              $sql = "SELECT * FROM annuncio WHERE nome_annuncio LIKE '%$search%' OR nome_prodotto LIKE '%$search%'";
              $result = mysqli_query($cid,$sql);
              $queryResult = mysqli_num_rows($result);
            }
            if (isset($_GET['cat'])){
               if ($_GET['cat'] == "elettrodomestici"){
                 $sql = "SELECT * FROM annuncio WHERE annuncio.categorie = 'elettrodomestici'";
                 $result = mysqli_query($cid,$sql);
                 $queryResult = mysqli_num_rows($result);
               }

            }
            if (isset($_GET['cat'])){
               if ($_GET['cat'] == "hobby"){
                 $sql = "SELECT * FROM annuncio WHERE annuncio.categorie = 'hobby'";
                 $result = mysqli_query($cid,$sql);
                 $queryResult = mysqli_num_rows($result);
               }

            }
            if (isset($_GET['cat'])){
               if ($_GET['cat'] == "fotoevideo"){
                 $sql = "SELECT * FROM annuncio WHERE annuncio.categorie = 'fotoevideo'";
                 $result = mysqli_query($cid,$sql);
                 $queryResult = mysqli_num_rows($result);
               }

            }
            if (isset($_GET['cat'])){
               if ($_GET['cat'] == "abbigliamento"){
                 $sql = "SELECT * FROM annuncio WHERE annuncio.categorie = 'abbigliamento'";
                 $result = mysqli_query($cid,$sql);
                 $queryResult = mysqli_num_rows($result);
               }

            }
            if (isset($_GET['sottocat'])){
                $sotcat = $_GET['sottocat'];
                 $sql = "SELECT * FROM annuncio WHERE annuncio.sottocategorie = '$sotcat'";
                 $result = mysqli_query($cid,$sql);
                 $queryResult = mysqli_num_rows($result);
               }

              echo "Sono usciti " .$queryResult . " risultati!";
              if ($queryResult > 0) {
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="card mb-3" id="annunci" style="max-width: 770px;">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="images/cellulare.jpg" class="card-img">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <?php
                            echo '<h2 class="card-title"> <a href="prodotto.php?codice='.$row["codice"].'"> '.Ucwords($row["nome_prodotto"]).' </a></h2>';
                            ?>
                            <p class="card-text"> <?php echo Ucwords($row['nome_annuncio']) ?></p>
                            <p class="card-text">Provenienza: <?php echo mb_strtoupper($row['provincia']) ?> </p>
                            <h4 class="card-text" style="color: #824f93 !important;">Prezzo: <b>€ <?php echo $row['prezzo'] ?> </b></h4>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>
                      </div>
                    </div>

                <?php }
              }



          ?>
        </div>

    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>
      <?php include "common/navbar.php";?>

      <div class="container-filtri-annunci">
      <!-- Navbar Sottocategorie -->
      <?php

          $sottocategorie = array();
          $sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altri elettrodomestici'];
          $sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori fotografici', 'Telecamere', 'Microfoni', 'Altro da foto e video'];
          $sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro da abbigliamento'];
          $sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Reviste', 'Altro da hobby'];

          if (isset($_GET['cat'])){
            $cat = $_GET['cat'];

               ?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                    <li>
                      <h5>Sottocategorie</h5>
                    </li>
                  <?php
                for ($i=0; $i < 5 ; $i++) {
                  $sotcat = $sottocategorie[$cat];?>
                  <li class="nav-item">
                    <a class="nav-link" href="annunci.php?cat=<?php echo "$cat"; ?>&sottocat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
                  </li>
                <?php
                }
              } else {?>
                <nav class="navbar bg-light" id="sottocategorie">
                  <ul class="navbar-nav">
                    <li>
                      <h5>Categorie</h5>
                    </li>
              <?php
              $categorie = array();
              $categorie = ['Elettrodomestici', 'Hobby', 'Foto e Video', 'Abbigliamento'];
               for ($i=0; $i < 4 ; $i++) {?>
                    <li class="nav-item">
                      <a class="nav-link" href="annunci.php?cat=<?php echo "$categorie[$i]" ;?>"><?php echo "$categorie[$i]"; ?></a>
                    </li>
              <?php
                }
              }?>
            </ul>
          </nav>

      <!-- Elenco annunci -->
        <div class='annunci'>
        <div class="card mb-3" id="annunci" style="max-width: 770px;">
          <div class="row no-gutters" style = "padding: 1.5rem;">
            <div class="col-md-8" >
              <h2 style="color: #9863a9">Risultati relativi a: </h2></br>
              <?php
              if (isset($_GET['cat'])){
                echo "<h4>". $_GET['cat']."</h4>";
                if (isset($_GET['sottocat'])){
                  echo "</br> <h4>".$_GET['sottocat']."</h4>";
                }
              }
              if (isset($_GET['stato'])){
                if ($_GET['stato']=="nuovo"){
                  echo "<h4>Nuovo</h4>";
                }else {
                  echo "<h4>Usato</h4>";
                }
              }
              if (isset($_GET['prezzo'])){
                  $prezzo = $_GET['prezzo'];
                  switch ($prezzo) {
                    case '1':
                    echo "<h4>Annunci tra gli 0 e i 20 euro</h4>";
                      break;
                    case '2':
                      echo "<h4>Annunci tra gli 20 e i 50 euro</h4>";
                      break;
                    case '3':
                      echo "<h4>Annunci tra gli 50 e i 100 euro</h4>";
                      break;
                    case '4':
                      echo "<h4>Annunci superiori ai 100 euro</h4>";
                      break;
                  }
                 }
                 if (isset($_POST['submit-search2'])){
                   $search = mysqli_real_escape_string($cid,$_POST['search2']);
                   echo '<h4>'. Ucwords($search).'</h4>';
                 }
               ?>
            </div>
            <div class="col-md-4">
                <img src="images/logo.png" class="card-img">
            </div>
          </div>
        </div>
        </div>

        <!-- Navbar filtri -->
        <nav class="navbar bg-light" id="sottocategorie">

          <ul class="navbar-nav">
            <li>
              <h5>Filtri di ricerca</h5>
            </li>
            <form id="stato" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Stato</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="annunci.php?stato=nuovo" >Nuovo</a>
                  <a class="dropdown-item" href="annunci.php?stato=usato" >Usato</a>
                </div>
              </li>
            </form>
            <form id="prezzo" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Prezzo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="annunci.php?prezzo=1">€ 0 - 20 </a>
                  <a class="dropdown-item" href="annunci.php?prezzo=2">€ 20 - 50</a>
                  <a class="dropdown-item" href="annunci.php?prezzo=3">€ 50 - 100</a>
                  <a class="dropdown-item" href="annunci.php?prezzo=4">€ 100 - ∞</a>
                </div>
              </li>
            </form>
            <form id="luogo" action="annunci.php" method="post">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Luogo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="annunci.php?luogo=provincia" >Nella mia provincia</a>
                  <a class="dropdown-item" href="annunci.php?luogo=regione" >Nella mia regione</a>
                </div>
              </li>
            </form>

          </ul>
        </nav>

        <div class='annunci'>
          <?php

            if (isset($_POST['submit-search2'])){
              $search = mysqli_real_escape_string($cid,$_POST['search2']);
              $sql = "SELECT * FROM annuncio WHERE nome_annuncio LIKE '%$search%' OR nome_prodotto LIKE '%$search%'";
            }
            if (isset($_GET['cat'])){
                $cat = $_GET['cat'];
                 $sql = "SELECT * FROM annuncio WHERE annuncio.categorie = '$cat'";
            }
            if (isset($_GET['sottocat'])){
                $sotcat = $_GET['sottocat'];
                 $sql = "SELECT * FROM annuncio WHERE annuncio.sottocategorie = '$sotcat'";
               }
            if (isset($_GET['stato'])){
              if ($_GET['stato']=="nuovo"){
                $sql = "SELECT * FROM annuncio WHERE annuncio.nuovo = 1";
              }else {
                $sql = "SELECT * FROM annuncio WHERE annuncio.nuovo = 0";
              }
            }
            if (isset($_GET['prezzo'])){
                $prezzo = $_GET['prezzo'];
                switch ($prezzo) {
                  case '1':
                    $sql = "SELECT * FROM annuncio WHERE annuncio.prezzo >= 0 AND annuncio.prezzo < 20";
                    break;
                  case '2':
                    $sql = "SELECT * FROM annuncio WHERE annuncio.prezzo >= 20 AND annuncio.prezzo < 50";
                    break;
                  case '3':
                    $sql = "SELECT * FROM annuncio WHERE annuncio.prezzo >= 50 AND annuncio.prezzo < 100";
                    break;
                  case '4':
                    $sql = "SELECT * FROM annuncio WHERE annuncio.prezzo >= 100 ";
                    break;
                }
               }

                 if(isset($_GET["luogo"])){
                   if (isset($_SESSION["indirizzo"])){
                     if ($_GET["luogo"]=="provincia"){
                       $sql = "SELECT * FROM annuncio WHERE annuncio.provincia = '$indirizzoscelto[2]'";
                     } elseif ($_GET["luogo"]=="regione"){
                       $sql = "SELECT * FROM annuncio WHERE annuncio.regione = '$indirizzoscelto[3]'";
                     }
                  } else {
                     $sql = "SELECT * FROM annuncio WHERE annuncio.regione = ''";
                 }
               }




            $result = mysqli_query($cid,$sql);
            $queryResult = mysqli_num_rows($result);
              if ($queryResult > 0) {
                while($row=mysqli_fetch_assoc($result)){
                  if ($row["acquirente"]==null){
                    if ($row["visibilita"]=="pubblica"){?>
                      <div class="card mb-3" id="annunci" style="max-width: 770px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                              <img src="<?php echo $row['foto']; ?>" class="card-img">
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
                    if ($row["visibilita"]=="ristretta"){
                      if(isset($_SESSION["indirizzo"])){
                        if ($indirizzoscelto[3]==$row["regione"]){?>
                        <div class="card mb-3" id="annunci" style="max-width: 770px;">
                          <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo $row['foto']; ?>" class="card-img">
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
                <?php   }
                      }
                    }
                  }
                }
              } else {
                echo "<h4> Non sono presenti annunci con questo filtro </h4>";
              }
          ?>
        </div>

    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
  <body>
      <?php include "../common/navbar.php";?>

      <div class="container-filtri-annunci">
      <!-- Navbar Sottocategorie -->
      <?php

          $sottocategorie = array();
          $sottocategorie['Elettrodomestici'] = ['Aspirapolveri', 'Caffettiere', 'Tostapane', 'Frullatori', 'Altri elettrodomestici'];
          $sottocategorie['Foto e Video'] = ['Macchine fotografiche', 'Accessori fotografici', 'Telecamere', 'Microfoni', 'Altro da foto e video'];
          $sottocategorie['Abbigliamento'] = ['Vestiti', 'Borse', 'Accessori', 'Scarpe', 'Altro da abbigliamento'];
          $sottocategorie['Hobby'] = ['Giocattoli', 'Film e DVD', 'Musica', 'Libri e Riviste', 'Altro da hobby'];

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
                    <a class="nav-link" href="annunci.php?cat=<?php echo "$cat"; ?>&sotcat=<?php  echo "$sotcat[$i]" ; ?>"><?php echo "$sotcat[$i]" ;?></a>
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
                if (isset($_GET['sotcat'])){
                  echo "</br> <h4>".$_GET['sotcat']."</h4>";
                }
              }
              if (isset($_GET['stato'])){
                if ($_GET['stato']=="nuovo"){
                  echo "<h4>Prodotti nuovi</h4>";
                }else {
                  echo "<h4>Prodotti usati</h4>";
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
                 if (isset($_GET['luogo'])){
                   if ($_GET['luogo']=="provincia"){
                     echo "<h4>Annunci nella tua provincia</h4>";
                   }else {
                     echo "<h4>Annunci nella tua regione</h4>";
                   }
                 }
               ?>
            </div>
            <div class="col-md-4">
                <img src="../images/logo.png" class="card-img">
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
              $sql1= "SELECT * FROM annuncio p WHERE p.nome_annuncio LIKE '%$search%' OR p.nome_prodotto LIKE '%$search%'";
              // $sql1 = "SELECT DISTINCT *
              //         FROM annuncio p, stato s
              //         WHERE p.nome_annuncio  LIKE '%$search%' OR p.nome_prodotto LIKE '%$search%' AND p.codice=s.prodotto AND p.visibilita !='privata' AND s.stato ='in vendita' AND  p.codice NOT IN
              //         	(SELECT s.prodotto
              //         	 FROM stato s2
              //          	 WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
              $ricerca = array();
              $ricerca2 = array();
              $result = mysqli_query($cid,$sql1);
              $j=0;
              while ($row=$result->fetch_row()) {
            			for ($i=0; $i < 19 ; $i++) {
            				$ricerca[$i] = $row[$i];
            			}
                  $ricerca2[$j] = $ricerca;
            			$j++;
              }
              print_r($ricerca);
              echo "</br>";
              print_r($ricerca2);
            }
            if (isset($_GET['cat'])){
                $cat = $_GET['cat'];
                 $sql = " SELECT *
                          FROM annuncio p, stato s
                          WHERE p.codice=s.prodotto AND p.categorie = '$cat' AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
            								(SELECT s.prodotto
            								FROM stato s2
            								WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
            }
            if (isset($_GET['sotcat'])){
                $sotcat = $_GET['sotcat'];
                 $sql = " SELECT *
                          FROM annuncio p, stato s
                          WHERE p.codice=s.prodotto AND p.sottocategorie = '$sotcat' AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
            								(SELECT s.prodotto
            								FROM stato s2
            								WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
               }
            if (isset($_GET['stato'])){
              if ($_GET['stato']=="nuovo"){
                $sql = "SELECT *
                        FROM annuncio p, stato s
                        WHERE p.codice=s.prodotto AND p.nuovo = 1 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                          (SELECT s.prodotto
                          FROM stato s2
                          WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
              }else {
                $sql = "SELECT *
                        FROM annuncio p, stato s
                        WHERE p.codice=s.prodotto AND p.nuovo = 0 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                          (SELECT s.prodotto
                          FROM stato s2
                          WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
              }
            }
            if (isset($_GET['prezzo'])){
                $prezzo = $_GET['prezzo'];
                switch ($prezzo) {
                  case '1':
                    $sql = "SELECT *
                            FROM annuncio p, stato s
                            WHERE p.codice=s.prodotto AND p.prezzo >= 0 AND p.prezzo < 20 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                              (SELECT s.prodotto
                              FROM stato s2
                              WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
                    break;
                  case '2':
                    $sql = "SELECT *
                            FROM annuncio p, stato s
                            WHERE p.codice=s.prodotto AND p.prezzo >= 20 AND p.prezzo < 50 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                              (SELECT s.prodotto
                              FROM stato s2
                              WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
                    break;
                  case '3':
                    $sql = "SELECT *
                            FROM annuncio p, stato s
                            WHERE p.codice=s.prodotto AND p.prezzo >= 50 AND p.prezzo < 100 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                              (SELECT s.prodotto
                              FROM stato s2
                              WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
                    break;
                  case '4':
                    $sql = "SELECT *
                            FROM annuncio p, stato s
                            WHERE p.codice=s.prodotto AND p.prezzo >= 100 AND p.visibilita !='privata' AND s.stato='in vendita' AND p.codice NOT IN
                              (SELECT s.prodotto
                              FROM stato s2
                              WHERE p.codice = s2.prodotto and s.data_ora < s2.data_ora)";
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
                  if ($row["visibilita"]!="ristretta"){?>
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
            <?php } else {
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
          ?>
        </div>

    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

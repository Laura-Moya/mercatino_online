<?php

session_start();

$tipoError = array("1" =>"Email non valida",
                    "2" =>"Password non valida");
$error = array();
$dat = array();

if (isset($_POST["status"]))
{
	if ($_POST["status"]=='ko') $error=unserialize($_POST["error"]);
	$dat=unserialize($_POST["dat"]);
}
else
{
	$dat["email"]="";
	$dat["password"]="";
}

include "db/connect.php";
include "common/funzioni.php";

if (isset($_SESSION["logged"])) {
  $risultato = prendereCF($cid, $_SESSION["utente"]);
  $codice_fiscale = $risultato['contenuto'];
  $risultato = prendereTipoUtente($cid, $_SESSION["utente"]);
  $tipoutente = $risultato["contenuto"];
  $risultato = prendereIndirizzi($cid, $codice_fiscale[0]);
  $indirizzi = $risultato['contenuto'];
}

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light" id="prima-navbar">

    <div class="col-sm-12 col-md-3 col-lg-3">
      <a class="navbar-brand" href="index.php"> <img src="./images/logo.png" style="width: 15rem;" id="logo" alt="logo"></a>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

      <form class="example" action="/search.php" method="POST" style="margin:auto;max-width:450px">
        <input type="text" placeholder="Cerca..." name="search2">
        <button type="submit" name="submit-search2"><i class="fa fa-search"></i></button>
      </form>

    </div>

    <div class="col-sm-6 col-md-3 col-lg-3">
      <ul class="navbar-nav">
        <?php

          if (isset($_SESSION["utente"]))
          {
            echo "<li class='nav-item'>";
            if ($tipoutente[0] == "venditore"){
              echo "<a class='nav-link' style='cursor: pointer;' href='profiloVenditore.php'>Profilo</a>";
            } else {
              echo "<a class='nav-link' style='cursor: pointer;' href='profiloAcquirente.php'>Profilo</a>";
            }
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' style='cursor: pointer;' onclick='messaggioLogout()'>Logout</a>";
            echo "</li>";
          }
          else {
           echo "<li class='nav-item'>";
           echo "<a class='nav-link' onclick='openForm()' style='cursor: pointer;' id='accedi'><i class='fas fa-sign-in-alt'></i>Accedi</a>";
           echo "<div class='form-popup container-registrazione' id='myForm'>";
           echo " <form action='./check.php' method='POST'>";
           echo "<h4>Il Tuo Mercatino Online</h4>";
           echo "<label for='email'><b>Email</b></label><br/>";
           echo "<input type='text' placeholder='Immettere Email' name='email' value=";
           $dat['email'];
           echo "></br>";
            if (isset($error['email'])) echo '<span class=\"error\'>' . $tipoerror[$error['email']] . "</span>";
           echo "<label for='psw'><b>Password</b></label> <br/>";
           echo "<input type='password' placeholder='Immettere Password' name='password' value=";
           $dat["password"];
           echo "></br>";
           if (isset($error['password'])) echo "<span class=\'error\'>" . $tipoerror[$error['password']] . "</span>";
           echo "<p>Non hai un account? <a href='./registrazione.php'>Registrati!</a></p>";
           echo "<button type='submit' class='btn btn-primary btn-login'>Accedi</button>";
           echo "<button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>";
           echo "</form>";
           echo "</div>";
           echo "</li>";
           }
        ?>
        <li class="nav-item">

        <?php

          if (isset($_SESSION["utente"])) {
            echo '<a class="nav-link" href="osservati.php"><i class="fas fa-eye fa-lg icon-eye"></i></a>';
          }
          else
          {
            echo '<a class="nav-link" style="cursor:pointer;" onclick= notLogged();><i class="fas fa-eye fa-lg icon-eye"></i></a>';
          }

        ?>
        </li>


      </ul>
    </div>

</nav>
<!-- Indirizzo e Categorie -->
<nav class="navbar navbar-expand-lg navbar-light">

  <div id ="indi">
    <?php
      echo '<p for="aaa"><i class="fas fa-map-marker"></i>Indirizzo </p>';
      echo '<select class="form-control form-control-md" id="aaa">';
        if (!isset($_SESSION["utente"])) {
          echo '<script type="text/javascript">';
          echo 'document.getElementById("indi").style.visibility = "hidden";';
          echo '</script>';
        }
        else {

          for ($i=0; $i < count($indirizzi);$i++){
            $indirizzo = $indirizzi[$i];
            echo '<option value=""> '. Ucwords($indirizzo[1]).'</option>';
          }
        }
        echo '</select>';

       ?>
    </select>
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent1">

    <ul class="navbar-nav second">
      <li class="nav-item ">
        <a class="nav-link" href="annunci.php">Elettrodomestici</a>
      </li>
      <li class="nav-item second">
        <a class="nav-link" href="annunci.php">Hobby</a>
      </li>
      <li class="nav-item second">
        <a class="nav-link" href="annunci.php">Foto e Video</a>
      </li>
      <li class="nav-item second">
        <a class="nav-link" href="annunci.php">Abbigliamento</a>
      </li>
    </ul>


  </div>

</nav>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

  function notLogged(){
    alert("Non sei loggato");
  }

  function messaggioLogout(){
    if (confirm('Sei sicuro che vuoi uscire?')) {
        window.location = "common/logout.php";
    }
  }

</script>
<!-- Linea di Divisione -->
<div class="linea"></div>

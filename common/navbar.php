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

include "../db/connect.php";
include "../common/funzioni.php";

if (isset($_SESSION["logged"])) {
  $risultato = prendereCF($cid, $_SESSION["utente"]);
  $codice_fiscale = $risultato['contenuto'];
  $risultato = prendereTipoUtente($cid, $_SESSION["utente"]);
  $tipoutente = $risultato["contenuto"];
  $risultato = prendereIndirizzi($cid, $codice_fiscale[0]);
  $indirizzi = $risultato['contenuto'];
}


if(isset($_POST["indirizzo"])){
  $indirizzo = $_POST["indirizzo"];
  $result_explode = explode('|', $indirizzo);
  $risultato = leggiAnnunci($cid);
  $annunci = $risultato['contenuto'];
  $_SESSION["indirizzo"] = $result_explode;
}

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light" id="prima-navbar">

    <div class="col-sm-12 col-md-3 col-lg-3">
      <a class="navbar-brand" href="../frontend/index.php"> <img src="../images/logo.png" style="width: 15rem;" id="logo" alt="logo"></a>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

      <form class="example" action="../frontend/annunci.php" method="POST" style="margin:auto;max-width:450px">
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
              echo "<a class='nav-link' style='cursor: pointer;' href='../frontend/profiloVenditore.php'>Profilo</a>";
            } else {
              echo "<a class='nav-link' style='cursor: pointer;' href='../frontend/profiloAcquirente.php'>Profilo</a>";
            }
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' style='cursor: pointer;' onclick='messaggioLogout()'>Logout</a>";
            echo "</li>";
          }
          else {
          ?>
             <!-- Login Popup -->
           <li class='nav-item'>
           <a class='nav-link' onclick='openForm()' style='cursor: pointer;' id='accedi'><i class='fas fa-sign-in-alt'></i>Accedi</a>
           <div class='form-popup container-registrazione' id='myForm'>
            <form action='../backend/login.php' method='POST'>
           <h4>Il Tuo Mercatino Online</h4>
           <label for='email'><b>Email</b></label><br/>
           <input type='text' placeholder='Immettere Email' value= "<?php echo $dat['email'];?>" name='email' id="email"></br>
           <?php
              echo "<label for='psw'><b>Password</b></label><br/>";
              echo "<input type='password' placeholder='Immettere Password' id='password' name='password' value=";
              $dat["password"];
              echo " ></br>";
              echo "<p>Non hai un account? <a href='../frontend/registrazione.php'>Registrati!</a></p>";
              echo "<button  class='btn btn-primary btn-login'  onclick='login()'>Accedi</button>";
              echo "<button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>";
             echo '</form>';
             echo '</div>';
             echo '</li>';
           }
        ?>
        <li class="nav-item">

        <?php

          if (isset($_SESSION["utente"])) {
            echo '<a class="nav-link" href="../frontend/osservati.php"><i class="fas fa-eye fa-lg icon-eye"></i></a>';
          }
          else
          {
            echo '<a class="nav-link" style="cursor:pointer;" onclick= notLogged();><i class="fas fa-eye fa-lg icon-eye"></i></a>';
          }

          if(isset($_POST["indirizzo"])){
            $indirizzo = $_POST["indirizzo"];
            $result_explode = explode('|', $indirizzo);
          }
        ?>
        </li>


      </ul>
    </div>

</nav>
<!-- Indirizzo e Categorie -->
<nav class="navbar navbar-expand-lg navbar-light">
<?php
if (isset($_SESSION["indirizzo"])) {
  $indirizzoscelto = $_SESSION["indirizzo"];
}
else {
  $indirizzoscelto = array();
  $indirizzoscelto[0] = "";
  $indirizzoscelto[1] = "";
  $indirizzoscelto[2] = "";
}
?>

   <!-- if (isset($_SESSION["utente"])) { -->

    <div id ="indi">
        <p for="aaa"><i class="fas fa-map-marker"></i>Indirizzo </p>
        <form method="post" id="indirizzoSelezionato">
          <select type="submit" class="form-control form-control-md" id="indirizzoSel" name="indirizzo" onchange="$('#indirizzoSelezionato').submit();">

            <option value="" ><?php echo Ucwords($indirizzoscelto[0]).' '.Ucwords($indirizzoscelto[2]); ?>  </option>

            <?php
            if (!isset($_SESSION["utente"])) {
              echo '<script type="text/javascript">';
              echo 'document.getElementById("indi").style.visibility = "hidden";';
              echo '</script>';
            }
            else {

              for ($i=0; $i < count($indirizzi);$i++){
                $indirizzo = $indirizzi[$i];
                echo '<option value="'. $indirizzo[1] .'|'. $indirizzo[2] .'|'. $indirizzo[3] .'|'. $indirizzo[4] .'" > '. Ucwords($indirizzo[1]).', '.Ucwords($indirizzo[3]).'</option>';
              }
            }
           ?>
         </select>

        </form>

    </div>


  <!-- } -->



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<form class="" action="./annunci.php" method="get">
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">

    <ul class="navbar-nav second">
      <?php
      $categorie = array("Elettrodomestici", "Hobby", "Foto e Video", "Abbigliamento");
      for ($i=0; $i < 4 ; $i++) {
        echo '<li class="nav-item second">';
          echo '<a type="submit" class="nav-link" href="../frontend/annunci.php?cat='. "$categorie[$i]".'">'. "$categorie[$i]".'</a>';
        echo '</li>';
      }
      ?>
    </ul>
  </div>
</form>


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
        window.location = "../common/logout.php";
    }
  }
  function login(){

        var email = $("#email").val();
        var password = $("#password").val();

        if (email == "" || password == "")
          alert("Inserire tutti i campi");
          $.ajax(
            {
              url: "navbar.php",
              data: {
                login: 1,
                emailPHP: email,
                passwordPHP: password
              },
              success: function(response) {
                console.log(response);
              }
            }
          );

  }


</script>
<!-- Linea di Divisione -->
<div class="linea"></div>

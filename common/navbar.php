<?php

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

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light" id="prima-navbar">

    <div class="col-sm-12 col-md-3 col-lg-3">
      <a class="navbar-brand" href="index.php"> <img src="./images/logo.png" style="width: 15rem;" id="logo" alt="logo"></a>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

    <form class="example" action="/action_page.php" style="margin:auto;max-width:450px">
      <input type="text" placeholder="Cerca..." name="search2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    </div>

    <div class="col-sm-6 col-md-3 col-lg-3">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php

            if ($cid)
            {

            }

          ?>

          <!-- LOGIN -->
          <a class="nav-link" onclick="openForm()" style="cursor: pointer;" id="accedi"><i class="fas fa-sign-in-alt"></i>Accedi</a>
            <div class="form-popup container-registrazione" id="myForm">
              <form action="./check.php" method="POST">
              <h4>Il Tuo Mercatino Online</h4>

              <label for="email"><b>Email</b></label> <br/>
              <input type="text" placeholder="Immettere Email" name="email"  value="<?php  echo $dat["email"];?>"> </br> <?php if (isset($error["email"])) echo "<span class=\"error\">" . $tipoerror[$error["email"]] . "</span>"; ?>

              <label for="psw"><b>Password</b></label> <br/>
              <input type="password" placeholder="Immettere Password" name="password"  value="<?php  echo $dat["password"];?>"> </br> <?php if (isset($error["password"])) echo "<span class=\"error\">" . $tipoerror[$error["password"]] . "</span>"; ?>
              <p>Non hai un account? <a href="./registrazione.php">Registrati!</a></p>

              <button type="submit" class="btn btn-primary btn-login">Accedi</button>
              <button type="button" class="btn btn-primary btn-login" onclick="closeForm()">Chiudi</button>
              </form>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="osservati.php"><i class="fas fa-eye fa-lg icon-eye"></i></a>
        </li>
      </ul>
    </div>

</nav>
<!-- Indirizzo e Categorie -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div>
    <p for="aaa"><i class="fas fa-map-marker"></i>Indirizzo </p>
    <select class="form-control form-control-md" id="aaa" required>
      <option value="">Via Pitteri, 56</option>
      <option value="">Via Dante Alighieri, 32</option>
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
</script>
<!-- Linea di Divisione -->
<div class="linea"></div>

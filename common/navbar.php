<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light" id="prima_navbar">

    <div class='container'>
        <div class='row'>
          <table>
                <tr>
                  <div class="col-sm-12 col-md-3 col-lg-3">
                  <td>

                    <a class="navbar-brand" href="index.php"> <img src="./images/logo.png" style="width: 15rem;" id="logo" alt="logo"> </a>

                  </td>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">

                <td>

              <form class='navbar-form'>
                <div class='input-group'>
                  <input type="text" placeholder="Search..">

                  <div class="">
                    <button type='submit' class='btn btn-default'>
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </td>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
          <td>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <!-- LOGIN -->
                  <a class="nav-link" onclick="openForm()"><i class="fas fa-sign-in-alt"></i>Accedi</a>
                    <div class="form-popup container-registrazione" id="myForm">
                      <form action="./check.php" method="POST">
                      <h4>Il Tuo Mercatino Online</h4>

                      <label for="email"><b>Email</b></label> <br/>
                      <input type="text" placeholder="Immettere Email" name="email" required><br/>

                      <label for="psw"><b>Password</b></label> <br/>
                      <input type="password" placeholder="Immettere Password" name="password" required> <br/>
                      <p>Non hai un account? <a href="./registrazione.php">Registrati!</a></p>

                      <button type="submit" class="btn btn-primary btn-login">Accedi</button>
                      <button type="button" class="btn btn-primary btn-login" onclick="closeForm()">Chiudi</button>
                    </form>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-eye fa-lg icon-eye"></i></a>
                </li>
              </ul>

          </td>
          </div>
        </tr>
        </div>
      </table>

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
        <a class="nav-link" href="annunci.php">Elettrodomestici</a>
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <?php include "common/navbar.php";?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-6">
          <img src="images/lisa2.jpg" style="width: 20%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-6">
          <h1 class="nome-profilo">LISA</h1>
          <h2 class="cognome-profilo">SIMPSON</h2>
          <p class="email-profilo" style="margin-top: 1rem;" type="email">Email: <a href="mailto: lisaSimpson@gmail.com">lisaSimpson@gmail.com</a></p>
          <div class="valutazione-profilo">
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
          </div>
          <p class="prodotti-venduti-profilo"><a href="#">Prodotti venduti</a>: 9</p>
          <p class="prodotti-in-vendita-profilo"><a href="#">Prodotti in vendita</a>: 4</p>
        </div>
      </div>
    </div>


    <!-- Link a gli annunci più osservati -->
    <p id="primo-piano">I più osservati</p>
    <!-- Annunci in vendita -->
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

  </body>

  <!-- include "common/footer.php"; -->
</html>

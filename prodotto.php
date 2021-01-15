<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>

    <?php include "common/navbar.php";?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h1 class="nome-annuncio">Si vende cellulare usato</h1>
          <p class="nome-prodotto" style="margin-top: 1rem;">Cellulare nuovo Samsung Svy192</p>
          <h2>Prezzo: 87.16€</h2>
          <p>Venditore: Valentina Maronese</p>
          <p>Regione: Lombardia</p>
          <p>Provincia: Milano</p>
          <p>Nuovo: Si</p>
          <p>Categoria: Hobby</p>
          <p>Sottocategoria: Cellulari</p>
          <p>Stato: In vendita</p>
          <button class="btn btn-primary" type="button" onclick="location.href='pagamento.php'">Acquista ora</button>
          <button class="btn btn-primary" type="button"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>
        </div>
      </div>
    </div>

  </body>

  <!-- include "common/footer.php"; -->
</html>

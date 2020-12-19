<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include "common/header.php";?>

  <body>

    <?php include "common/navbar.php";?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h2>Stai per acquistare questo prodotto...</h2>
          <p class="nome-prodotto" style="margin-top: 1rem;">Cellulare nuovo Samsung Svy192</p>
          <p>Venditore: Valentina Maronese</p>
          <div class="stessa-riga">
            <p for="validationCustom03">Preferisce:</p>
            <select style="width: 50% !important;" class="form-control form-control-md" name="category" id="validationCustom03" onchange="ChangecatList()" required>
              <option value="">Seleziona... </option>
              <option value="Ritiro a mano">Ritiro a mano</option>
              <option value="Spedizione">Spedizione</option>
            </select>
          </div>

          <h2>Prezzo: 87.16€</h2>
          <button class="btn btn-primary" type="button">Acquista ora</button>
          <button class="btn btn-primary" type="button"><i class="fas fa-eye fa-md icon-eye" id="eye-prodotto"></i> Osserva</button>
        </div>
      </div>
    </div>


  </body>

  <!-- include "common/footer.php"; -->
</html>

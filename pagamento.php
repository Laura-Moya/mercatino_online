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
            <select style="width: 50% !important;" class="form-control form-control-md" name="category" id="validationCustom03" onchange="mostrare()" required>
              <option value="">Seleziona... </option>
              <option value="ritiro_a_mano">Ritiro a mano</option>
              <option value="carta_credito">Spedizione</option>
            </select>
          </div>

          <div id="ritiro_a_mano">
            <p>Come vuoi pagare?</p>
            <select style="width: 50% !important;" class="form-control form-control-md" name="category" id="validationCustom03" onchange="mostrare()" required>
              <option value="">Seleziona... </option>
              <option value="contanti">Contanti</option>
              <option value="carta_credito">Carta di pagamento</option>
            </select>
          </div>

          <!-- style="display: none;" -->
          <div id="carta_credito">
            <form action="" method="">
              <h6>Inserisce i dati de la sua carta</h6>
              <input type="text" name="intestatario" placeholder="Nome e cognome..."><br/>
              <input type="number" maxlength="16" name="numero_carta" placeholder="Numero di carta..."><br/>
              <input type="text" maxlength="5" name="data_scadenza" placeholder="mm/aa"><br/>
              <input type="number" maxlength="3" name="cvv" placeholder="CVV...">

            </form>
          </div>

          <h2>Prezzo: 87.16€</h2>
          <button class="btn btn-primary" type="button">Acquista ora</button>
        </div>
      </div>
    </div>


  </body>

  <!-- include "common/footer.php"; -->
</html>

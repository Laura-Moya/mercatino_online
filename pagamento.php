<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      <script type="text/javascript" src="common/pagare.js"></script>
      </head>
  <body>

    <?php include "common/navbar.php";?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h2>Stai per acquistare questo prodotto...</h2>
          <h5 class="nome-prodotto" style="margin-top: 1rem;">Cellulare nuovo Samsung Svy192</h5>
          <p>Venditore: Valentina Maronese</p>

          <div class="stessa-riga" >
            <h6>Preferisce:</h6>
              <form>
                <input type="radio" name="opcion" id="opcionA" >
                <label style="margin-right:0.5rem" for="opcionA">Ritiro a mano </label>
                <input type="radio" name="opcion" id="opcionB" >
                <label style="margin-right:0.5rem" for="opcionB">Spedizione</label>
              </form>
            </div>

            <div class="ciao" >

            </div>

            <!--
            <select style="width: 50% !important;" class="form-control form-control-md" onchange="mostrareMetodo();" name="selezionaMetodo" required>
              <option value="">Seleziona... </option>
              <option value="ritiro_a_mano">Ritiro a mano</option>
              <option value="carta_credito">Spedizione</option>
            </select>   -->

          <h6 style="margin-top: 1rem;">Come vuoi pagare?</h6>
          <div id="pagamento">
            <input class="pagamento" type="radio" name="pagamento" value="contanti">
            <label style="margin-right:0.5rem" for="contanti">Contanti</label>
            <input class="pagamento" type="radio" name="selezionaMetodo" value="carta_credito">
            <label style="margin-right:0.5rem" for="carta_credito">Carta di pagamento</label>
          </div>

          <!-- <div id="ritiro_a_mano">

            <select style="width: 50% !important;" class="form-control form-control-md" onchange="" required>
              <option value="">Seleziona... </option>
              <option value="contanti">Contanti</option>
              <option value="carta_credito">Carta di pagamento</option>
            </select>
          </div> -->


          <div id="carta_credito">
            <form action="" method="">
              <h6 style="margin-top: 1rem;">Inserisce i dati de la sua carta</h6>
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

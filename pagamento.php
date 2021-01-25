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
            <input type = "radio" id = "B" name ="AA" checked="checked"/>
            <label style="margin-right:0.5rem" for = "B" > Spedizione </label>
            <input type = "radio" id ="A" name ="AA"/>
            <label style="margin-right:0.5rem" for = "A"> Ritiro a mano </label>

            <div class="paga" >
              <h6 style="margin-top: 1rem;">Come vuoi pagare?</h6>
              <input type="radio" name="P" onclick="closeDiv()" checked="checked"/>
              <label style="margin-right:0.5rem">Contanti</label>
              <input type="radio" name="P"onclick="openDiv()"/>
              <label style="margin-right:0.5rem">Carta di pagamento</label>
            </div>

            <div id="cartacredito" style= "display:none">
                <h6 style="margin-top: 1rem;">Inserisce i dati de la sua carta</h6>
                <input type="text" name="intestatario" placeholder="Nome e cognome..."/><br/>
                <input type="number" maxlength="16" name="numero_carta" placeholder="Numero di carta..."/><br/>
                <input type="text" maxlength="5" name="data_scadenza" placeholder="mm/aa"/><br/>
                <input type="number" maxlength="3" name="cvv" placeholder="CVV..."/>
            </div>
          <h2 id="prezzo" >Prezzo: 87.16€</h2>
          <button class="btn btn-primary" type="button">Acquista ora</button>
        </div>
      </div>
    </div>
    <script>
      function openDiv() {
        document.getElementById("cartacredito").style.display = "block";
      }

      function closeDiv() {
        document.getElementById("cartacredito").style.display = "none";
      }
    </script>


  </body>

  <!-- include "common/footer.php"; -->
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
      </head>
  <body>

    <?php
     include "common/navbar.php";
     $codice = $_GET["codice"];
     $risultato = leggiAnnuncio($cid, $codice);
     $prodotto = $risultato['contenuto'];

     if (isset($_GET["errore"])){
       echo '<script type="text/javascript">alert("Immettere tutti i campi della carta di pagamento")</script>';
     }
    ?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/cellulare.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h4>Stai per acquistare questo prodotto...</h4>
          <h2 class="nome-prodotto" style="margin-top: 1rem;"><?php echo Ucwords("$prodotto[1]"); ?></h2>
          <p>Venditore: <?php echo Ucwords("$prodotto[3]") . Ucwords(" $prodotto[4]"); ?></p>
          <div class="stessa-riga" >
          <form class="" action="acquistaOra.php?codice= <?php echo "$codice"; ?>" method="post">
            <h6>Preferisce:</h6>
              <input class="inputpaga" type = "radio" id = "B" name ="AA" value="spedizione"/>
              <label class="labelpagamento" for = "B"> Spedizione </label>
              <input class="inputpaga" type = "radio" id ="A" name ="AA"/ value="ritiroamano">
              <label class="labelpagamento" for = "A"> Ritiro a mano </label>

              <div class="paga">
                <h6 style="margin-top: 1rem;">Come vuoi pagare?</h6>
                <input class="inputpaga" type="radio" id="C" name="P" value="contanti" onclick="closeDiv()" />
                <label class="labelpagamento" for="C">Contanti</label>
                <input class="inputpaga" type="radio" id= "CA" name="P" value="carta" onclick="openDiv()"/>
                <label class="labelpagamento"for="CA">Carta di pagamento</label>
              </div>

            <div id="cartacredito">
                <h6 style="margin-top: 1rem;">Inserisce i dati de la sua carta</h6>
                <input type="text" name="intestatario" placeholder="Nome e cognome..."/><br/>
                <input type="number" maxlength="16" name="numero_carta" placeholder="Numero di carta..."/><br/>
                <input type="text" maxlength="5" name="data_scadenza" placeholder="mm/aa"/><br/>
                <input type="number" maxlength="3" name="cvv" placeholder="CVV..."/>
            </div>
            <h2 id="prezzo" >Prezzo: € <?php echo "$prodotto[2]"; ?></h2>
            <button class="btn btn-primary" type="submit" >Acquista ora</button>
          </form>


        </div>
      </div>
    </div>

    <script>
      function openDiv() {
        document.getElementById("cartacredito").style.visibility = "visible";
        document.getElementById("cartacredito").style.height = "auto";
      }

      function closeDiv() {
        document.getElementById("cartacredito").style.visibility = "hidden";
        document.getElementById("cartacredito").style.height = "0px";
      }
    </script>


  </body>

  <!-- include "common/footer.php"; -->
</html>

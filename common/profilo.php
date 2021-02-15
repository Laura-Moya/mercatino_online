<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "header.php";?>
  </head>
  <body>

    <?php include "navbar.php";?>

    <?php
      if (!isset($_SESSION['utente'])){
        echo '<div class="jumbotron jumbotron-fluid">';
        echo '<div class="container"> ';
        echo '<h1 class="display-4">Non sei loggato</h1>';
        echo '<p class="lead">Non puoi accedere a questa pagina se non sei loggato, clicca "accedi" per procedere con il login</p>';
        echo '<p class="lead">';
        echo '<a class="btn btn-primary btn-lg" onclick="openForm()" role="button">Accedi</a>';
        echo '</p>';
        echo '</div>';
        echo '</div>';
        exit;
      }
      //Funzione leggiUtente
      $risultato = leggiUtente($cid, $codice_fiscale[0]);
      $utente = $risultato['contenuto'];
      //Funzione leggiProdottiAcquistati
      $risultato = leggiProdottiAcquistati($cid, $codice_fiscale[0]);
      $prodottiAcquistati = $risultato['contenuto'];
      //Funzione leggiProdottiOsservati
      $risultato = leggiProdottiOsservati($cid, $codice_fiscale[0]);
      $prodottiOsservati = $risultato['contenuto'];


    ?>
    <!-- Popup eliminaAccount -->
    <div class='form-popup2 container-registrazione' id='eliminaAccount'>
      <form action='eliminaAccount.php' method='get'>
      <h4>Sei sicuro di voler eliminare l'account? </h4>

      <button type='submit' class='btn btn-primary btn-login'> <a style="color: white !important;" href="eliminaAccount.php?codiceFiscale=<?php echo $codice_fiscale[0];?>">OK </a></button>
      <button type='button' class='btn btn-primary btn-login' onclick='closeForm()'>Chiudi</button>
      </form>
    </div>

    <!-- Popup aggiungiIndirizzo -->
    <div class='form-popup3 container-registrazione' id='aggiungiIndirizzo'>
      <form action='aggiungiIndirizzo.php' method='POST'>
      <h4>Aggiungi un nuovo indirizzo!</h4>

      <label>Nuova Via: </label>
      <input type="text" name="nuovaVia">
      <label>Nuovo Comune: </label>
      <input type="text" name="nuovoComune">
      <label>Nuova Regione:</label>
      <input type="text" name="nuovaRegione">
      <label>Nuova Provincia: </label>
      <input type="text" name="nuovaProvincia" maxlength="2"></br>

      <button type='submit' class='btn btn-primary btn-login'> <a style="color: white !important;"
              href="aggiungiIndirizzo.php?indirizzo=<?php echo '$_POST["nuovaVia"]'; ?>">OK </a></button>
      <button type='button' class='btn btn-primary btn-login' onclick='closeFormIndirizzo()'>Chiudi</button>
      </form>
    </div>

    <span class="eliminaAccount additional-btn">
      <button class="btn btn-primary" type="submit" ><a style="color: white !important; padding: 1rem;" onclick='openForm()'>Elimina account</a> </button>
    </span>
    <span class="aggiungiIndirizzo additional-btn">
      <button class="btn btn-primary" type="submit" ><a style="color: white !important; padding: 1rem;" onclick='openFormIndirizzo()'>Aggiungi un indirizzo</a> </button>
    </span>
    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/lisa2.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h1 class="nome-profilo"> <?php echo Ucwords("$utente[0]"); ?> </h1>
          <h2 class="cognome-profilo"> <?php echo Ucwords("$utente[1]"); ?> </h2>
          <p class="email-profilo" style="margin-top: 1rem;" type="email">Email: <a href="mailto: <?php echo "$utente[2]"; ?>"><?php echo "$utente[2]"; ?> </a></p>
          <?php
            echo '<div class="valutazione-profilo">';
            for ($i=0; $i < round($utente[3]); $i++) {
              echo '<i class="fas fa-star fa-2x"></i>';
            }
            $mancano = 5 - round($utente[3]);
            for ($i=0; $i < $mancano; $i++) {
              echo '<i class="far fa-star fa-2x"></i>';
            }
            echo '</div>';
          ?>

          <p class="prodotti-venduti-profilo"><a href="./prodottiAcquistati.php">Prodotti acquistati:</a> <?php echo "$prodottiAcquistati[0]"; ?> </p>
          <p class="prodotti-venduti-profilo"><a href="osservati.php">Prodotti osservati:</a> <?php echo "$prodottiOsservati[0]"; ?> </p>


          <script>
            function openForm() {
              document.getElementById("eliminaAccount").style.display = "block";
            }

            function closeForm() {
              document.getElementById("eliminaAccount").style.display = "none";
            }

            function openFormIndirizzo() {
              document.getElementById("aggiungiIndirizzo").style.display = "block";
            }

            function closeFormIndirizzo() {
              document.getElementById("aggiungiIndirizzo").style.display = "none";
            }
          </script>

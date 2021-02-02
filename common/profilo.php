<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "header.php";?>
  </head>
  <body>

    <?php include "navbar.php";?>

    <?php

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

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/lisa2.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h1 class="nome-profilo"> <?php echo Ucwords("$utente[0]"); ?> </h1>
          <h2 class="cognome-profilo"> <?php echo Ucwords("$utente[1]"); ?> </h2>
          <p class="email-profilo" style="margin-top: 1rem;" type="email">Email: <a href="mailto: lisaSimpson@gmail.com"><?php echo "$utente[2]"; ?> </a></p>
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

          <p class="prodotti-venduti-profilo"><a href="#">Prodotti acquistati:</a> <?php echo "$prodottiAcquistati[0]"; ?> </p>
          <p class="prodotti-venduti-profilo"><a href="osservati.php">Prodotti osservati:</a> <?php echo "$prodottiOsservati[0]"; ?> </p>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "header.php";?>
  </head>
  <body>

    <?php include "navbar.php";?>
    <?php include 'funzioni.php'; ?>
    <?php

      $risultato = leggiUtente($cid, 'MRNVNT96R63I577A');
      $utente = $risultato['contenuto'];

    ?>

    <div class="container-profilo container">
      <div class="row">
        <div class="immagine-profilo col-sm-12 col-md-6 col-lg-4">
          <img src="images/lisa2.jpg" style="width: 70%;" alt="immagine_profilo">
        </div>
        <div class="info-profilo col-sm-12 col-md-6 col-lg-8">
          <h1 class="nome-profilo"> <?php echo Ucwords("$utente[0]"); ?> </h1>
          <h2 class="cognome-profilo"> <?php echo Ucwords("$utente[1]"); ?> </h2>
          <p class="email-profilo" style="margin-top: 1rem;" type="email">Email: <a href="mailto: lisaSimpson@gmail.com">lisaSimpson@gmail.com</a></p>
          <div class="valutazione-profilo">
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
            <i class="fas fa-star fa-2x"></i>
          </div>
          <p class="prodotti-venduti-profilo"><a href="#">Prodotti acquistati</a>: 3</p>
          <p class="prodotti-venduti-profilo"><a href="osservati.php">Prodotti osservati</a>: 5</p>

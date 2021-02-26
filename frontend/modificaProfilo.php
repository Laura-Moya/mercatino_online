
<?php

$tipoErrore = array("1"=>"Inserire il nuovo nome",
                    "2" =>"Inserire il nuovo cognome",
          					"3" =>"Inserire nuova password",
                    "4" =>"Errore nel DB");
$errore = array();
$dati = array();


// if (isset($_GET["status"]))
// {
// 	if ($_GET["status"]=='ko') $errore=unserialize($_GET["errore"]);
// 	$dati=unserialize($_GET["dati"]);
// }
// else
// {
// 	$dati["nomeannuncio"]="";
// 	$dati["nomeprodotto"]="";
// 	$dati["prezzo"]="";
// }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../common/header.php";?>
  </head>
  <body>

  <?php include "../common/navbar.php";
  if (!isset($_SESSION['utente'])){
    include "../common/jumbotron.php";
  }

  $risultato = leggiUtente($cid, $codice_fiscale[0]);
  $utente = $risultato['contenuto'];

  ?>
  <div class="container-creare-annuncio" align="center">
      <form action='../backend/checkModifica.php' method="post">
        <table class="" style="margin-bottom:2rem;">
          <tr>
            <h2 class="title">Modifica Profilo</h2>
          </tr>

          <tr>
            <td colspan="2"><h6>Nome</h6></td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="nome" value= "<?php echo $utente[0]; ?>"> </br>
             </td>
          </tr>
          <tr>
            <td colspan="2"> <h6> Cognome</h6> </td>
          </tr>
          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="cognome" value = "<?php echo $utente[1]; ?>"> </br>

             </td>
          </tr>

          <tr>
            <td colspan="2"><h6>Password</h6></td>
          </tr>

          <tr>
            <td colspan="2"> <input class="form-size" type="text" name="password" value = "<?php echo $utente[4]; ?>"> </br>
             </td>
          </tr>

          <tr >
            <td align="center"><img src="<?php echo $utente[3]; ?>" style="width:10rem; margin: 1rem 0rem;" name="immagine"></td>
          </tr>

          <tr>
            <td colspan="2" align="center"> <h6 style="margin-top: 0.5rem;">Cambia la tua immagine di profilo!</h6></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="file" name="foto"></td>
          </tr>
          <!-- Buttons -->
          <tr>
            <td align="center" >
              <input class="btn btn-primary" style ="width:49%;" type="submit" value="OK" />
              <input class="btn btn-primary" style ="width:49%;" type = "reset" value = "Cancella"/>
            </td>
          </tr>

        </table>
      </form>
    </div>


  </body>
</html>

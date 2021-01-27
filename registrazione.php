<?php

$tipoErrore = array("1"=>"Nome non valido",
                    "2" =>"Cognome non valido",
          					"3" =>"Email non valida",
          					"4" => "Password non valida",
          					"5" => "Codice fiscale non valido");
$errore = array();
$dati = array();

if (isset($_GET["status"]))
{
	if ($_GET["status"]=='ko') $errore=unserialize($_GET["errore"]);
	$dati=unserialize($_GET["dati"]);
}
else
{
	$dati["nome"]="";
	$dati["cognome"]="";
	$dati["email"]="";
	$dati["password"]="";
	$dati["codice-fiscale"]="";
	$dati["tipoutente"]="";
  $dati["immagine"]="";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "common/header.php";?>
  </head>
  <body>

    <div class="container-registrazione">
        <form action="CheckDataRegistrazione.php" method="GET">
          <table class="tabella-registrazione">
            <tr>

              <h2 class="title"><i class="icona fas fa-arrow-left"></i>Registrazione</h2>
            </tr>
            <tr>
              <td> <h6>Nome</h6>  </td>
              <td> <h6 class="destra"> Cognome</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="text" name="nome"  value="<?php  echo $dati["nome"];?>"> </br> <?php if (isset($errore["nome"]))  echo "<span class=\"errore\">" . $tipoErrore[$errore["nome"]] . "</span>"; ?>
              </td>
              <td> <input class="destra" type="text" name="cognome" value="<?php  echo $dati["cognome"];?>"> </br> <?php if (isset($errore["cognome"])) echo "<span class=\"errore destra\">" . $tipoErrore[$errore["cognome"]] . "</span>"; ?> </td>
            </tr>
            <tr>
              <td> <h6>Email</h6> </td>
              <td> <h6 class="destra">Password</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="email" name="email" value="<?php  echo $dati["email"];?>"> </br> <?php if (isset($errore["email"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["email"]] . "</span>"; ?>
               </td>
              <td><input class="destra" type="password" name="password" value="<?php  echo $dati["password"];?>"> </br> <?php if (isset($errore["password"])) echo "<span class=\"errore destra\">" . $tipoErrore[$errore["password"]] . "</span>"; ?> </td>
            </tr>
              <tr>
                <td><h6>Seleziona tipo utente</h6>
                <input type="radio" id="venditore" name="tipoutente" value="venditore"<?php echo $dati["tipoutente"]=='venditore'?"checked":"";?>>
                <label style="margin-right:0.5rem" for="venditore">Venditore </label>
                <input type="radio" id="acquirente" name="tipoutente" value="acquirente" <?php echo $dati["tipoutente"]=='acquirente'?"checked":"";?>>
                <label for="acquirente">Acquirente</label></td>
                <td> <h6 class="destra">Codice Fiscale</h6> <input class="destra" maxlength="16" type="text" name="codice-fiscale" value="<?php  echo $dati["codice-fiscale"];?>"> </br> <?php if (isset($errore["codice-fiscale"])) echo "<span class=\"errore destra\">" . $tipoErrore[$errore["codice-fiscale"]] . "</span>"; ?>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center"> <h6 style="margin-top: 0.5rem;">Carica una immagine per il tuo profilo</h6></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="file" name="immagine" value="<?php  echo $dati["immagine"];?>"></td>
              </tr>
              <tr>
                <td> <p>Hai già una account? <a href="index.php">Login!</a></p> </td>
              </tr>
              <tr>
                <td align="center">
                  <input class="btn btn-primary" id="btn" type="submit" value="OK" />

                </td>
                <td align="center">
                  <input class="btn btn-primary" id="btn" type = "reset" value = "Cancella"/>
                </td>
              </tr>
          </table>
        </form>
    </div>

  </body>
  <!-- include "common/footer.php"; -->
</html>

<?php

$tipoErrore = array("1"=>"nome non valido",
                    "2" =>"cognome non valido",
          					"3" =>"email non valida",
          					"4" => "password non valida",
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
	$dati["tipo_utente"]="acquirente";
  $dati["immagine"]="";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <div class="container-registrazione">
        <form action="CheckData.php" method="GET">
          <table class="tabella-registrazione">
            <tr>
              <h2 class="title">Registrazione Profilo</h2>
            </tr>
            <tr>
              <td> <h6>Nome</h6>  </td>
              <td> <h6 class="destra"> Cognome</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="text" name="nome"  value="<?php  echo $dati["nome"];?>"> <?php if (isset($errore["nome"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["nome"]] . "</span>"; ?>
              </td>
              <td> <input class="destra" type="text" name="cognome" value="<?php  echo $dati["cognome"];?>"> <?php if (isset($errore["cognome"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["cognome"]] . "</span>"; ?> </td>
            </tr>
            <tr>
              <td> <h6>Email</h6> </td>
              <td> <h6 class="destra">Password</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="email" name="email" value="<?php  echo $dati["email"];?>"> <?php if (isset($errore["email"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["email"]] . "</span>"; ?>
               </td>
              <td><input class="destra" type="password" name="password" value="<?php  echo $dati["password"];?>"> <?php if (isset($errore["password"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["password"]] . "</span>"; ?> </td>
            </tr>
              <tr>
                <td><h6>Seleziona tipo utente</h6>
                <input type="radio" id="venditore" name="tipo_utente" value="venditore"<?php echo $dati["tipo_utente"]=='venditore'?"checked":"";?>>
                <label style="margin-right:0.5rem" for="venditore">Venditore </label>
                <input type="radio" id="acquirente" name="tipo_utente" value="acquirente" <?php echo $dati["tipo_utente"]=='acquirente'?"checked":"";?>>
                <label for="acquirente">Acquirente</label></td>
                <td> <h6 class="destra">Codice Fiscale</h6> <input class="destra" maxlength="16" type="text" name="codice-fiscale" value="<?php  echo $dati["codice-fiscale"];?>"> <?php if (isset($errore["codice-fiscale"])) echo "<span class=\"errore\">" . $tipoErrore[$errore["codice-fiscale"]] . "</span>"; ?>
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

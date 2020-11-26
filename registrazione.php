<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <div class="container-registrazione">
        <form class="" action="index.php" method="post">
          <table class="tabella-registrazione">
            <tr>
              <h2 class="title">Registrazione Profilo</h2>
            </tr>
            <tr>
              <td> <h6>Nome</h6>  </td>
              <td> <h6 id="destra"> Cognome</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="text" name="nome"> </td>
              <td> <input style="margin-left:1.5rem;" type="text" name="cognome"> </td>
            </tr>
            <tr>
              <td> <h6>Email</h6> </td>
              <td> <h6 id="destra">Password</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="email" name="email"> </td>
              <td><input style="margin-left:1.5rem;" type="password" name="password"> </td>
            </tr>
              <tr>
                <td colspan="2" align="center"><h6>Seleziona tipo utente</h6>
                <input type="radio" id="venditore" name="tipo_utente" value="venditore">
                <label for="venditore">Venditore </label>
                <br>
                <input type="radio" id="acquirente" name="tipo_utente" value="acquirente">
                <label style="margin-bottom: 1rem;" for="acquirente">Acquirente</label></td>

              </tr>
              <tr>
                <td colspan="2" align="center">Codice Fiscale</td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="text" name="codice-fiscale"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">Carica una immagine per il tuo profilo</td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="file" name=""></td>
              </tr>
              <tr>
                <td align="center">
                  <input class="btn btn-primary" type="submit" value="OK" />

                </td>
                <td align="center">
                  <input class="btn btn-primary" type = "reset" value = "Cancella"/>
                </td>
              </tr>
          </table>
        </form>
    </div>

  </body>
  <!-- include "common/footer.php"; -->
</html>

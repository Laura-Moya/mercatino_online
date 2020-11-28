<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <div class="container-registrazione">
        <form action="" method="">
          <table class="tabella-registrazione">
            <tr>
              <h2 class="title">Registrazione Profilo</h2>
            </tr>
            <tr>
              <td> <h6>Nome</h6>  </td>
              <td> <h6 class="destra"> Cognome</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="text" name="nome"> </td>
              <td> <input class="destra" type="text" name="cognome"> </td>
            </tr>
            <tr>
              <td> <h6>Email</h6> </td>
              <td> <h6 class="destra">Password</h6> </td>
            </tr>
            <tr>
              <td> <input style="margin-right:1.5rem;" type="email" name="email"> </td>
              <td><input class="destra" type="password" name="password"> </td>
            </tr>
              <tr>
                <td><h6>Seleziona tipo utente</h6>
                <input type="radio" id="venditore" name="tipo_utente" value="venditore">
                <label style="margin-right:0.5rem" for="venditore">Venditore </label>
                <input type="radio" id="acquirente" name="tipo_utente" value="acquirente">
                <label for="acquirente">Acquirente</label></td>
                <td> <h6 class="destra" style="vertical-align: sub">Codice Fiscale</h6> <input class="destra" type="text" name="codice-fiscale"> </td>
              </tr>
              <tr>
                <td colspan="2" align="center"> <h6 style="margin-top: 0.5rem;">Carica una immagine per il tuo profilo</h6></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="file" name=""></td>
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

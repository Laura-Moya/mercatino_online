<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <h2 class="title">Registrazione Profilo</h2>
    <form class="" action="index.php" method="post">
      <table>

        <tr>
          <td>Nome </td>
          <td>Cognome </td>
        </tr>
        <tr>
          <td> <input type="text" name="nome"> </td>
          <td> <input type="text" name="cognome"> </td>
        </tr>
        <tr>
          <td>Email </td>
          <td>Password </td>
        </tr>
        <tr>
          <td> <input type="email" name="email"> </td>
          <td><input type="password" name="password"> </td>
        </tr>
        <tr>
          <td><p>Seleziona tipo utente</p>
          <input type="radio" id="venditore" name="tipo_utente" value="venditore">
          <label for="venditore">Venditore</label>
          <input type="radio" id="acquirente" name="tipo_utente" value="acquirente">
          <label for="acquirente">Acquirente</label></td>

        </tr>
        <tr>
          <td>Codice Fiscale</td>
          <td>Carica una immagine per il tuo profilo</td>
        </tr>
        <tr>
          <td><input type="text" name="codice-fiscale"></td>
          <td><input type="file" name="dfghj"></td>
        </tr>

      </table>
    </form>

  </body>
  <!-- include "common/footer.php"; -->
</html>

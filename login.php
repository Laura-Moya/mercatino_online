<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <div class="container-registrazione">
        <form action="check.php" method="POST">
          <table>
            <tr>
              <h2 class="title">Login</h2>
            </tr>
            <tr>
              <td>Email </td>
            </tr>
            <tr>
              <td> <input type="email" name="email"> </td>
            </tr>
            <tr>
              <td>Password </td>
            </tr>
            <tr>
              <td><input type="password" name="password"> </td>
            </tr>
            <tr>
              <td align="center">
                <input class="btn btn-primary btn-login " style="width: 48%;" type="submit" value="OK" />
                <input class="btn btn-primary btn-login " style="width: 48%;" type = "reset" value = "Cancella"/>
              </td>
            </tr>

          </table>
        </form>
    </div>

    <div class="errore">
      <?php

        if (isset($_POST["errore"]))
        {
          if ($_POST["errore"] == "login")
            echo "La email dell'utente che hai inserito è errata";
          if ($_POST["errore"] == "password")
            echo "La password che hai inserito è errata";
        }

      ?>
    </div>

  </body>
  <!-- include "common/footer.php"; -->
</html>

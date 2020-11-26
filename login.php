<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include "common/header.php";?>
  <body>

    <div class="container-registrazione">
        <form class="" action="index.php" method="post">
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
                <input class="btn btn-primary" type="submit" value="OK" />
                <input class="btn btn-primary" type = "reset" value = "Cancella"/>
              </td>
            </tr>

          </table>
        </form>
    </div>

  </body>
  <!-- include "common/footer.php"; -->
</html>

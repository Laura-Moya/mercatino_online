<?php

  $email = $_POST["email"];
  $password = $_POST["password"];

  if ($email != "21@gmail.com" || $password != "123")
  {
      if ($email != "21@gmail.com") {
        $parameter = "Location: login.php?errore=login&login=$email";
      }
      if ($password != "123") {
        $parameter = "Location: login.php?errore=login&login=$password";
      }

      header($parameter);
  }
  else
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mercatino Online</title>
  </head>
  <body>
    <h2>Benvenuto <?php echo $email?>!</h2>
  </body>
</html>
<?php
}
?>

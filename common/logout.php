<?php

session_start();
session_unset();
session_destroy();

$parameter = "Location: ../index.php";
header($parameter);
exit();

?>

<?php

session_start();
session_unset();
session_destroy();

$parameter = "Location: ../frontend/index.php";
header($parameter);
exit();

?>

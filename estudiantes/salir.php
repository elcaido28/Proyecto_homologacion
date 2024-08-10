<?php
session_start();
session_unset();
unset($_SESSION['ES_USU']);
unset($_SESSION['CEDU']);

session_destroy();

header("Location:index.php");
 ?>

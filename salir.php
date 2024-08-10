<?php
session_start();
session_unset();
unset($_SESSION['NU']);
unset($_SESSION['TD']);
unset($_SESSION['S']);
unset($_SESSION['PD']);
unset($_SESSION['SC']);
unset($_SESSION['CA']);
session_destroy();

header("Location:index.php");
 ?>

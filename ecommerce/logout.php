<?php

session_start();
unset($_SESSION['user']);
setcookie("email","", time() -1, '/');
header('location:login.php');



?>
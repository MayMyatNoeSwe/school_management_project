<?php 
session_start();
session_destroy();
unset($_SESSION['admin']);
unset($_SESSION['user_id']);
unset($_SESSION['name']);
header("Location: login.php");
exit();
?>
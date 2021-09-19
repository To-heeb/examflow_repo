<?php session_start();

unset($_SESSION['user_id']);
session_destroy();
header("Location: examflow_login_signup.php?message=login");//Head back to login

?>
<?php session_start();

unset($_SESSION['student_passcode']);
session_destroy();
header("Location: examflow_examlogin.php");//Head back to login

?>
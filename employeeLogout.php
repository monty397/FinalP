<?php 
session_start();
 unset($_SESSION['sess_eUser']); 
 session_destroy();  
 header("location:EmployeeLogin.php");
?>
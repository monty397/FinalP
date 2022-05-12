<?php 
session_start();
 unset($_SESSION['sess_cUser']); 
 session_destroy();  
 header("location:adminLogin.php");
?>
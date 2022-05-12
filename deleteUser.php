<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:userLogin.php");
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "coffee";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$id = $_GET['id'];

$query= "delete from customer WHERE customer_id=$id"; 
$result = mysqli_query($conn,$query) or die ("cannot select DB");
header('Location:userLogin.php');
?>
<?php
session_start();
if (!isset($_SESSION["sess_eUser"])) {
    header("location:employeeLogin.php");
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
$username = $_SESSION['sess_eUser'];

$id = $_GET['id'];

$status = $_POST['status'];
mysqli_query($conn, "update orderitem set status ='$status' where order_id='$id'");
header('location:employeeOrderTable.php');
?>
<?php
session_start();
if (!isset($_SESSION["sess_cUser"])) {
    header("location:adminLogin.php");
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
$username = $_SESSION['sess_cUser'];

$id = $_GET['id'];

$itemPrice = $_POST['item_price'];
mysqli_query($conn, "update product set item_price ='$itemPrice' where item_id='$id'");
header('location:adminMenu.php');
?>
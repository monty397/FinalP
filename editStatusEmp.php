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
$query = mysqli_query($conn, "SELECT * FROM orderitem where order_id ='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Update Status</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
</head>

<body>
    <div id="container">
        <nav>
            <div id="logo">
                Coffee Hub
            </div>
            <ul>
                <li><a href="employeeOrderTable.php">Orders</a></li>
                <li><a href="myEmployeeInfo.php">My Info</a></li>
                <li><a href="employeeLogout.php">Sign out</a></li>
            </ul>
        </nav>
    </div>

    <h2>Update Status</h2>
    <div id="login-form-wrap">
        <form method="POST" action="updateEmp.php?id=<?php echo $id; ?>">
            <p>
                <!--  -->
                <select name="status" style="width:100px; height:50px">
                    <option value="---">---</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Preparing">Preparing</option>
                    <option value="En Route">En Route</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </p>
            <p>
                <input type="submit" name="submit" value="Update">
            </p>
        </form>
    </div>

    <footer class="footer-distributed">
        <div class="footer-left">
            <pre>
            <h3>                  Coffee<span>Hub</span></h3></pre>
            <p class="footer-links">
                <a href="employeeOrderTable.php" class="link-1">Orders</a>
                <a href="myEmployeeInfo.php">My info</a>
            </p>
            <p class="footer-company-name">Coffee Hub © 2021</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>#21 Park Ridge </span> Fyzabad, Trinidad</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+555-555-5555</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">support@coffeehub.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>Where our coffee is prepared to satsify the ones we care about most, You!
            </p>
            <div class="footer-icons">
            </div>
        </div>
    </footer>
</body>

</html>
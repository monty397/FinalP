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

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Menu</title>
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
                <li><a href="adminIndex.php">Home</a></li>
                <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"><a>Menu &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="dd">
                        <div id="up_arrow"></div>
                        <ul>
                            <li><a href="addMenu.php">Add Menu Item</a></li>
                            <li><a href="adminMenu.php">View Menu</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="adminOrderTable.php">Orders</a></li>
                <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"><a>Employee &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="dd">
                        <div id="up_arrow"></div>
                        <ul>
                            <li><a href="myAdminInfo.php">My Info</a></li>
                            <li><a href="adminEmployeeTable.php">Employee Table</a></li>
                            <li><a href="adminSignup.php">Register Employee</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="adminLogout.php">Sign out</a></li>
            </ul>
        </nav>
    </div>

    <section>
        <?php
        while ($rows = mysqli_fetch_array($result)) {
        ?>
            <article>
                <p>
                    <img src="coffee/<?php echo $rows['item_image']; ?>" alt=" " height="250px" width="250px"><br>
                    <?php echo $rows['item_name']; ?><br>
                    $<?php echo $rows['item_price']; ?>.00

                </p>
            </article>
        <?php
        }
        ?>
    </section>
</body>
<footer class="footer-distributed">
    <div class="footer-left">
        <pre>
            <h3>                  Coffee<span>Hub</span></h3></pre>
        <p class="footer-links">
            <a href="adminindex.php" class="link-1">Home</a>
            <a href="adminMenu.php">Menu</a>
            <a href="adminOrderTable.php">Orders</a>
            <a href="myAdminInfo.php">My Info</a>
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

</html>
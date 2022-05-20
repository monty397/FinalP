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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Orders</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewpoint" content="width=device-width, intial-scale=1">
</head>

<body>
    <!-- back to top button  -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

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

    <h1 id="title">Orders</h1>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date of Order</th>
                <th>Item Name</th>
                <th>Item Cost</th>
                <th>Quantity</th>
                <th>Item Total</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Edit Status</th>
            </tr>
        </thead>
        <?php
        $sql2 = "SELECT * FROM orderitem";
        $result2 = $conn->query($sql2);
        while ($rows = mysqli_fetch_array($result2)) {
        ?>
            <tr>
                <td><?php echo $rows['order_id']; ?></td>
                <td><?php echo $rows['date']; ?></td>
                <td><?php echo $rows['item_name']; ?></td>
                <td>$<?php echo $rows['item_cost']; ?>.00</td>
                <td><?php echo $rows['quantity']; ?></td>
                <td>$<?php echo $rows['item_total']; ?>.00</td>
                <td><?php echo $rows['fname']; ?></td>
                <td><?php echo $rows['address']; ?></td>
                <td><?php echo $rows['contact']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td><a href="editStatusEmp.php?id=<?php echo $rows['order_id']; ?>">Edit</a></td>
            <?php
        }
            ?>
    </table>
</body>
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
<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</html>
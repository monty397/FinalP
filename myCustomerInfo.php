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
$username = $_SESSION['sess_user'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | CoffeeHub</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
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
                <li><a href="customerHome.php">Home</a></li>
                <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"><a>My Info &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="dd">
                        <div id="up_arrow"></div>
                        <ul>
                            <li><a href="myCustomerInfo.php">View Customer Information</a></li>
                            <li><a href="orderHistory.php">My Orders</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="customerMenu.php">Menu</a></li>
                <li><a href="shoppingCart.php">My Cart<img class="cart_img" src="carts.jpg"></a></li>
                <li><a href="logout.php">Sign out</a></li>
            </ul>
        </nav>
    </div>

    <h1 id="title">Customer Info</h1>

    <table class="content-table">
        <thead>
            <tr>
                <!-- <th style="text-align:center;"></th>
                <th style="text-align:center;"></th> -->
            </tr>
        </thead>

        <?php
        $sql2 = "SELECT * from customer WHERE cust_username = '$username'";
        $result2 = $conn->query($sql2);
        while ($rows = mysqli_fetch_array($result2)) {
        ?>
            <tr>
                <th>Customer ID</th>
                <td><?php echo $rows['customer_id']; ?></td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td><?php echo $rows['cust_name']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $rows['cust_username']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $rows['cust_email']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $rows['cust_address']; ?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $rows['cust_contact']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $rows['cust_password']; ?></td>
            </tr>
    </table>
    <p>
        <button class="delete_acc" onclick="deleteAcc()"><a href="deleteUser.php?id=<?php echo $rows['customer_id']; ?>">Delete Account</a></button>
    </p>

    <script>
        function deleteAcc() {
            confirm("Are you sure you want to delete your account? If you proceed with this action, you will lose all of your data but information about past orders you've made will be available for the business.");
        }
    </script>
<?php
        }
?>

<footer class="footer-distributed">
    <div class="footer-left">
        <pre>
            <h3>                  Coffee<span>Hub</span></h3></pre>
        <p class="footer-links">
            <a href="customerHome.php" class="link-1">Home</a>
            <a href="customerMenu.php">Menu</a>
            <a href="shoppingCart.php">Cart</a>
            <a href="orderHistory.php">My Orders</a>
            <a href="myCustomerInfo.php">My Info</a>
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
</body>

</html>
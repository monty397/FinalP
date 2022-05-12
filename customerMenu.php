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

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome <?= $_SESSION['sess_user']; ?></title>
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
                <li><a href="shoppingCart.php">My Cart</a></li>
                <li><a href="logout.php">Sign out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Menu Table -->
    <section>
        <?php
        while ($rows = mysqli_fetch_array($result)) {
        ?>
            <article>
                <form method="post" action="shoppingCart.php?id=<?= $rows['item_id'] ?>">
                    <p>
                        <img src="coffee/<?php echo $rows['item_image']; ?>" alt=" " height="250px" width="250px"><br>
                        <?php echo $rows['item_name']; ?><br>
                        $<?php echo $rows['item_price']; ?>
                        <input type="hidden" name="item_name" value="<?= $rows['item_name']; ?>" />
                        <input type="hidden" name="item_price" value="<?= $rows['item_price']; ?>" />
                        <input type="number" name="quantity" value="1"></td>
                        <button class="add_to_cart" name="add_cart">Add to Cart</button></td>
                    </p>
                </form>
            </article>
        <?php
        }
        ?>
    </section>

    <!-- Footer -->
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
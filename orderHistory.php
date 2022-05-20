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

$query = ("SELECT cust_name, cust_address, cust_contact FROM customer where cust_username ='$username'");
$result1 = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($result1);

if ($numrows != 0) {
    while ($rows = mysqli_fetch_assoc($result1)) {
        $_SESSION['name'] = $rows['cust_name'];
        $_SESSION['address'] = $rows['cust_address'];
        $_SESSION['contact'] = $rows['cust_contact'];
    }
} else {
    echo "Error!";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | My Orders</title>
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

    <h1 id="title">My Orders</h1>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Date</th>
                <th>Item Name</th>
                <th>Item Cost</th>
                <th>Quantity</th>
                <th>Item Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <?php
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM userorder where fname = '$name'";
        $user_result = $conn->query($sql);
        while ($rows = mysqli_fetch_array($user_result)) {
        ?>
            <tbody>

                <?php
                $sql2 = "SELECT * from orderitem WHERE order_id = $rows[order_id];";
                $order_result = $conn->query($sql2);
                $total = 0;
                while ($rows1 = mysqli_fetch_array($order_result)) {
                ?>
                    <tr>
                        <td><?php echo $rows1['order_id']; ?></td>
                        <td><?php echo $rows1['date']; ?></td>
                        <td><?php echo $rows1['item_name']; ?></td>
                        <td>$<?php echo $rows1['item_cost']; ?>.00</td>
                        <td><?php echo $rows1['quantity']; ?></td>
                        <td>$<?php echo $rows1['item_total']; ?>.00</td>
                        <td><?php echo $rows1['status']; ?></td>
                    </tr>
                    </td>
                    </tr>
                <?php
                }
                ?>

            <?php
        }
            ?>
            </tbody>
    </table>
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
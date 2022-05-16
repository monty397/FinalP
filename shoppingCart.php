<?php
error_reporting(0);
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

// Sessions for placing order.
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

//Storing session variable for future use.

//Cart information
if (isset($_POST['add_cart'])) {
    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "item_id");
        if (!in_array($_GET['id'], $session_array_id)) {
            $session_array = array(
                'item_id' => $_GET['id'],
                'item_name' => $_POST['item_name'],
                'item_price' => $_POST['item_price'],
                'quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'item_id' => $_GET['id'],
            'item_name' => $_POST['item_name'],
            'item_price' => $_POST['item_price'],
            'quantity' => $_POST['quantity'],
        );
        $_SESSION['cart'][] = $session_array;
    }
}


if (isset($_POST['removeItem'])) {
    foreach ($_SESSION['cart'] as $keys) {
        echo "<script>
            alert('Item Removed');
            window.location.href='shoppingcart.php';
            </script>";
        $item_name = $_POST['item_name'];
        if (array_key_exists($item_name, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$item_name]);
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | My Cart</title>
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

    <h1 id="title">My Cart</h1>

    <form method="POST" action="">
        <?php
        $output = "";
        $output .= "
    <table class='content-table'>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>    
    ";
        if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $sum = $value['item_price'] * $value['quantity'];
                $total = $total + $sum;
                $output .= "
                <tr>
                    <td>" . $value['item_name'] . "</td>
                    <td>$" . $value['item_price'] . "</td>
                    <td>" . $value['quantity'] . "</td>
                    <td>$$sum</td> 
                    <td>
                        <form action='' method = 'POST'>
                            <button name ='removeItem'>Remove</button>
                            <input type='hidden' name='item_name' value='" . $key . "'>
                        </form>    
                    </td>
                </tr>
                ";
            }
        }
        echo $output;
        ?>
        </table>
        <p>
        <h2> <?php echo 'Total Cost = $', $total; ?>.00</h2>
        <p><button class="cart_button" name="submit">Purchase</button>
        <p>
        </p>
    </form>
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
</body>

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

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "coffee";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
if (isset($_POST["submit"])) {
    $fullName = $_SESSION['name'];
    $address = $_SESSION['address'];
    $contact = $_SESSION['contact'];

    //inserting into userOrder table
    $query1 = "INSERT INTO userorder (fname, address, contact) VALUES ('$fullName', '$address', '$contact')";
    if (mysqli_query($conn, $query1)) {
        $order_id = mysqli_insert_id($conn);

        //inserting item & info into orderItem
        $query2 = "INSERT INTO orderitem (Order_id, item_name, item_cost, quantity, item_total) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $query2);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isiii", $order_id, $item_name, $item_cost, $quantity, $item_total);
            foreach ($_SESSION['cart'] as $key => $value) {
                $item_name = $value['item_name'];
                $item_cost = $value['item_price'];
                $quantity = $value['quantity'];
                $item_total = $value['item_price'] * $value['quantity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            echo "<script>
                    alert('Order Placed');
                    window.location.href='customerHome.php';
                    </script>";
        } else {
            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
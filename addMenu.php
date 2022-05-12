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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Add Item</title>
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


    <div id="add-item-form-wrap">
        <form action="#" method="post" enctype="multipart/form-data">
            <p id="item">
                <input type="text" id="" name="item_name" placeholder="Please Enter Item Name" required><i class="validation"><span></span><span></span></i>
            </p>
            <p id="item">
                <input type="text" id="" name="item_price" placeholder="Please Enter Item Cost" required><i class="validation"><span></span><span></span></i>
            </p>

            <input type="file" name="img_upload" style="margin-left: 130px">
            <p>
                <input type="submit" name="submit" value="upload">
            </p>
        </form>

        <?php
        if (isset($_POST["submit"])) {
            if (!empty($_POST['item_name'])) {
                $item_name = $_POST['item_name'];
                $item_price = $_POST['item_price'];

                //Upload file into coffee folder in FinalP directory.
                $img_name = $_FILES['img_upload']['name'];
                $tmp_img_name = $_FILES['img_upload']['tmp_name'];
                $folder = 'coffee/';
                move_uploaded_file($tmp_img_name, $folder . $img_name);

                //SQL
                $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);
                mysqli_select_db($con, 'coffee') or die("cannot select DB");

                $query = ("SELECT * FROM product WHERE item_name='" . $item_name . "'");
                $result = mysqli_query($con, $query);

                $numrows = mysqli_num_rows($result);
                if ($numrows == 0) {
                    $sql = "INSERT INTO product (item_name, item_price, item_image) VALUES('$item_name','$item_price', '$img_name')";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        echo "<script>
                            alert('This item has been added to the menu!');
                            window.location.href='addMenu.php';
                            </script>";
                    } else {
                        echo "Failure!";
                    }
                } else {
                    echo "That item already exists! Please try again with another.";
                }
            } else {
                echo "All fields are required!";
            }
        }
        ?>
    </div>

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
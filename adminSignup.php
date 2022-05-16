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
// $username = $_SESSION['sess_cUser'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Register Employee</title>
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


    <div class="reg-container">
        <div class="title">New Employee Form</div>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="emp_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="emp_username" placeholder="Enter your last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="emp_email" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="emp_address" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="emp_contact" placeholder="Enter your address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="emp_password" placeholder="Enter your number" required>
                    </div>

                </div>

                <p></p>
                <div class="button">
                    <input type="submit" name="submit" value="Register">
                </div>

            </form>
            <?php
            if (isset($_POST["submit"])) {
                if (!empty($_POST['emp_username']) && !empty($_POST['emp_password'])) {
                    $emp_name = $_POST['emp_name'];
                    $emp_username = $_POST['emp_username'];
                    $emp_email = $_POST['emp_email'];
                    $emp_address = $_POST['emp_address'];
                    $emp_contact = $_POST['emp_contact'];
                    $emp_password = $_POST['emp_password'];

                    $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);



                    mysqli_select_db($con, 'coffee') or die("cannot select DB");

                    $query = ("SELECT * FROM employee WHERE emp_username='" . $emp_username . "'");
                    $result = mysqli_query($con, $query);

                    $numrows = mysqli_num_rows($result);
                    if ($numrows == 0) {
                        $sql = "INSERT INTO employee (emp_name, emp_username, emp_email, emp_address, emp_contact, emp_password) VALUES('$emp_name','$emp_username', '$emp_email', '$emp_address', '$emp_contact', '$emp_password')";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            echo "<script>
                            alert('Employee ($emp_name) has been successfully Registered!');
                            window.location.href='adminSignup.php';
                            </script>";
                        } else {
                            echo "Failure!";
                        }
                    } else {
                        echo "That username already exists! Please try again with another.";
                    }
                } else {
                    echo "All fields are required!";
                }
            }
            ?>
        </div>
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
            <!-- <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a> -->
        </div>
    </div>
</footer>

</html>
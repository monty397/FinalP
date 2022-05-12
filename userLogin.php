<!DOCTYPE html>
<html>

<head>
    <title>Log in | CoffeeHub</title>
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
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="userRegistration.php">Sign up</a></li>
                <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"><a href="#">Sign in &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="dd">
                        <div id="up_arrow"></div>
                        <ul>

                            <li><a href="adminLogin.php">Admin</a></li>
                            <li><a href="userLogin.php">Customer</a></li>
                            <li><a href="employeeLogin.php">Employee</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div id="login-form-wrap">
        <h2>Customer Login</h2>
        <form action="" method="POST">
            <p>
                <input type="text" name="cust_username" placeholder="Enter your Username" required><i class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input type="password" name="cust_password" placeholder="Enter your Password" required><i class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input type="submit" name="submit" value="Login">
            </p>
        </form>
        <div id="create-account-wrap">
            <p>Not a member? <a href="sign%20up.html">Create Account</a>
            <p>
        </div>
        <!--create-account-wrap-->
        <?php
        if (isset($_POST["submit"])) {

            if (!empty($_POST['cust_username']) && !empty($_POST['cust_password'])) {

                $cust_username = $_POST['cust_username'];
                $cust_password = $_POST['cust_password'];
                $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);

                $query = ("SELECT cust_username, cust_password FROM customer WHERE cust_username='" . $cust_username . "' AND cust_password='" . $cust_password . "'");
                $result = mysqli_query($con, $query);
                $numrows = mysqli_num_rows($result);


                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dbusername = $row['cust_username'];
                        $dbpassword = $row['cust_password'];
                    }

                    if ($cust_username == $dbusername && $cust_password == $dbpassword) {
                        session_start();
                        $_SESSION['sess_user'] = $cust_username;

                        /* Redirect browser */
                        header("Location: customerHome.php");
                    }
                } else {
                    echo "Invalid username or password!";
                }
            } else {
                echo "All fields are required!";
            }
        }
        ?>
    </div>
    <footer class="footer-distributed">
        <div class="footer-left">
            <pre>
            <h3>                  Coffee<span>Hub</span></h3></pre>
            <p class="footer-links">
                <a href="home.php" class="link-1">Home</a>
                <a href="menu.php">Menu</a>
                <a href="about.php">About</a>
                <a href="userRegistration.php">Sign Up</a>
                <a href="userLogin">Sign In</a>
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
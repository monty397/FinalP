<!DOCTYPE html>
<html>

<head>
    <title>Sign up | CoffeeHub</title>
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
                <li><a href="ourLocations.php">Locations</a></li>
                <li><a href="userRegistration.php">Sign up</a></li>
                <li><a href="userLogin.php">Sign in</a></li>
            </ul>
        </nav>
    </div>

    <div class="reg-container">
        <div class="title">Register For Free Today</div>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="cust_name" placeholder="Enter your Full Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="cust_username" placeholder="Enter your Username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="cust_email" placeholder="Enter your Email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="cust_address" placeholder="Enter your Address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="cust_contact" placeholder="Enter your Contact Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="cust_password" placeholder="Enter your Password" required>
                    </div>
                </div>

                <p>
                    By clicking Register, you agree to our <br />
                    <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
                </p>
                <div class="button">
                    <input type="submit" name="submit" value="Register">
                </div>
                <p>Already have an account? <a href="userLogin.php">Login here.</a></p>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                if (!empty($_POST['cust_username']) && !empty($_POST['cust_password'])) {
                    $cust_name = $_POST['cust_name'];
                    $cust_username = $_POST['cust_username'];
                    $cust_email = $_POST['cust_email'];
                    $cust_address = $_POST['cust_address'];
                    $cust_contact = $_POST['cust_contact'];
                    $cust_password = $_POST['cust_password'];

                    $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);



                    mysqli_select_db($con, 'coffee') or die("cannot select DB");

                    $query = ("SELECT * FROM customer WHERE cust_username='" . $cust_username . "'");
                    $result = mysqli_query($con, $query);

                    $numrows = mysqli_num_rows($result);
                    if ($numrows == 0) {
                        $sql = "INSERT INTO customer (cust_name, cust_username, cust_email, cust_address, cust_contact, cust_password) VALUES('$cust_name','$cust_username', '$cust_email', '$cust_address', '$cust_contact', '$cust_password')";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            echo "<script>
                            alert('You are now a member of CoffeeHub! Please enter username and password to login.');
                            window.location.href='userLogin.php';
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

    <footer class="footer-distributed">
        <div class="footer-left">
            <pre>
            <h3>                  Coffee<span>Hub</span></h3></pre>
            <p class="footer-links">
                <a href="home.php" class="link-1">Home</a>
                <a href="menu.php">Menu</a>
                <a href="ourLocations.php">Our Locations</a>
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
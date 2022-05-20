<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
</head>

<body>
    <!-- back to top button  -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    
    <!-- <div id="container">
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
    </div> -->

    <div id="login-form-wrap">
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <p>
                <input type="text" name="admin_username" placeholder="Enter your Username" required><i class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input type="password" name="admin_password" id="password" placeholder="Enter your Password" required><i class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input type="submit" name="submit" value="Login">
            </p>
        </form>
        <div id="create-account-wrap">
            <p>
        </div>
        <?php
        if (isset($_POST["submit"])) {

            if (!empty($_POST['admin_username']) && !empty($_POST['admin_password'])) {

                $admin_username = $_POST['admin_username'];
                $admin_password = $_POST['admin_password'];
                $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);

                $query = ("SELECT admin_username, admin_password FROM administrator WHERE admin_username='" . $admin_username . "' AND admin_password='" . $admin_password . "'");
                $result = mysqli_query($con, $query);
                $numrows = mysqli_num_rows($result);


                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dbusername = $row['admin_username'];
                        $dbpassword = $row['admin_password'];
                    }

                    if ($admin_username == $dbusername && $admin_password == $dbpassword) {
                        session_start();
                        $_SESSION['sess_cUser'] = $admin_username;

                        /* Redirect browser */
                        header("Location: adminIndex.php");
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
</body>

</html>
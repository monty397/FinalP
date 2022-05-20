<!DOCTYPE html>
<html>

<head>
    <title>Coffee Hub | Employee Login</title>
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
        <h2>Employee Login</h2>
        <form action="" method="POST">
            <p>
                <input type="text" name="emp_username" placeholder="Enter your Username" required><i class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input type="password" name="emp_password" id="password" placeholder="Enter your Password" required><i class="validation"><span></span><span></span></i>
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

            if (!empty($_POST['emp_username']) && !empty($_POST['emp_password'])) {

                $emp_username = $_POST['emp_username'];
                $emp_password = $_POST['emp_password'];
                $con = mysqli_connect('localhost', 'root', '', 'coffee') or die("Connection failed: %s\n" . $conn->error);

                $query = ("SELECT emp_username, emp_password FROM employee WHERE emp_username='" . $emp_username . "' AND emp_password='" . $emp_password . "'");
                $result = mysqli_query($con, $query);
                $numrows = mysqli_num_rows($result);


                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dbusername = $row['emp_username'];
                        $dbpassword = $row['emp_password'];
                    }

                    if ($emp_username == $dbusername && $emp_password == $dbpassword) {
                        session_start();
                        $_SESSION['sess_eUser'] = $emp_username;

                        /* Redirect browser */
                        header("Location: employeeOrderTable.php");
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
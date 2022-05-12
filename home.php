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

    <div class="home-container1">
        <h1>Welcome to Coffee Hub</h1>
        <h2>Where our coffee is prepared to satsify the ones we care about most, You!</h2>
    </div>

    <div class="container">
        <div class="box1">
            <div>
                <a href="menu.php"><img class="home_img" src="coffee.jpg"></a>
            </div>
            <h2>CoffeeHub's Menu<br></h2>
            <p>Please check it out and see what we have to offer.</p>
        </div>
        <div class="box2">
            <div>
                <a href="about.php"><img class="home_img" src="about-us.jpg"></a>
            </div>
            <h2>What is CoffeeHub?</h2>
            <p>If you want to find out more about us, please click here.</p>
        </div>
        <div class="box3">
            <div>
                <a href="userRegistration.php"><img class="home_img" src="membership.jpg"></a>
            </div>
            <h2>Are you a Member?</h2>
            <p>Sign Up today to join our growing community.</p>
        </div>
    </div>

    <div class="container2">
        <div>
            <img class="cont2_img" src="delivery.jpg">
            <h1 class="cont_h1">Dont want to come in at our location? No problem!</h1>
            <p class="cont_p">At CoffeeHub we offer a hassle-free delivery service to your specific location. <br>
                Contact us at 868-xxx-xxxx for more information.</p>
            <p class="cont_p">We are here to to serve our most valued asset, You!</p>

        </div>
    </div>

    <div class="container">
        <div class="box1">
            <div>
                <img class="home_img" src="working.jpg">
            </div>
            <h2>Working Hours</h2>
            <p>Monday: 8am - 4pm <br>
                Tuesday: 8am - 4pm <br>
                Wednesday: 8am - 4pm <br>
                Thursday: 8am - 4pm <br>
                Friday: 8am - 4pm <br>
                Saturday: 8am - 1pm <br></p>
        </div>
        <div class="box2">
            <div>
                <img class="home_img" src="socials.jpg">
            </div>
            <h2>Our Socials</h2>
            <p></p>
        </div>
        <div class="box3">
            <div>
                <img class="home_img" src="location.png">
            </div>
            <h2>Our Locations</h2>
            <p>Port-of-Spain, San-Fernando, Chaguanas, Fyzabad, Penal, Debe.</p>
            <p>More on the way soon!</p>
        </div>
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
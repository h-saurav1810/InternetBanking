<?php
	session_start();
	$_SESSION['loginCounter'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Bank</title>
    <link href="/bankproject/index_css.scss" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <img src="./horizon5.png" width="150" height="100">
        <div id="container" class="nav-items">
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Support</a>
            <a href="#">Portfolio</a>
        </div>
        <button onclick="location.href='bank_login.php'"> Sign In </button>
    </nav>

    <header class="hero-section">
        <div class="hero-text-container">
            <h1> Next Generation Digital Banking </h1>
            <p>Take your financial life online. Horizon bank account will be a one-stop-shop 
                for spending, saving, <br/>budgeting, investing, and much more.</p>
                <br>

            <button onclick="location.href='bank_registration.php'">Create Account Now</button>
        </div>
        <div class="hero-img-container">
            <img src="./wallpaper2.jpg">
        
    
        </div>
    </header>

    <footer class="footer">
        <div class="footer-container">

        </div>
    </footer>
</body>
</html>
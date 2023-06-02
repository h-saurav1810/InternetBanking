<!DOCTYPE html>
<html>

    <head>
		<title>Banking Website</title>
        <link href="/bankproject/homepageCSS.css" rel="stylesheet">
	</head>
	<body>
		<div id="" class="">
            <h1>BLUE HORIZON</h1>
            
            
        <a href="homepage.html"><img src="/bankproject/horizon1.png" alt="Banking System" title="Banking Website"></a>
        </div>
		<div id="log_sign">
            <li><a href="#">Login</a></li>
            <li><a href="#">Sign Up</a></li>
        </div>
		<div id="navbar">
            <div id="nav">
				<div id = "viewbalance">
					<li><a href="#">View Balance </a></li>
				</div>
				<div id = "transferfunds">
					<li><a href="#">Tranfer Funds</a></li>
				</div>
				<div id ="paybills">
					<li><a href="#">Pay Bills</a></li>
				</div>
				<div id ="bankstatement">
					<li><a href="#">Bank Statement</a></li>
				</div>
			</div>
		</div>
		
		<div class="slideshow-container">
            <div class="mySlides fade">
                <div class="wordtext">View Balance</div>
                <img src="/bankproject/viewbalance.png">
            </div>
            <div class="mySlides fade">
                <div class="wordtext">Tranfer Fund</div>
                <img src="/bankproject/transferfunds.png">
            </div>
            <div class="mySlides fade">
                <div class="wordtext">Pay Bills</div>
                <img src="/bankproject/paybills.png">
            </div>
			<div class="mySlides fade">
                <div class="wordtext">Bank Statement</div>
                <img src="/bankproject/bankstatement.png">
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
			<span class="dot"></span>
        </div>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides()
            {
                var i;
                var slides = document.getElementsByClassName( "mySlides" );
                var dots = document.getElementsByClassName( "dot" );
                for ( i = 0; i < slides.length; i++ ) {
                    slides[ i ].style.display = "none";
                }
                slideIndex++;
                if ( slideIndex > slides.length ) { slideIndex = 1 }
                for ( i = 0; i < dots.length; i++ ) {
                    dots[ i ].className = dots[ i ].className.replace( " active", "" );
                }
                slides[ slideIndex - 1 ].style.display = "block";
                dots[ slideIndex - 1 ].className += " active";
                setTimeout( showSlides, 5000 ); // Change image every 2 seconds
            }
        </script>
		
		<div id="disp">
            <p>Login to see your Details here:</p>
            <div>
                <input type="text" disabled name="name" id="name" placeholder="Beneficiary Name" value="">
                <input type="number" disabled name="accno" id="accno" value="" placeholder="Account No.">
            </div>
        </div>
        <div id="foot">
            <a href="aboutUs.html">About Us</a>
        </div>
	</body>
</html>
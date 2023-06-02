<?php
    session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	// require 'path/to/PHPMailer/src/Exception.php';
	// require 'path/to/PHPMailer/src/PHPMailer.php';
	// require 'path/to/PHPMailer/src/SMTP.php';
	require 'vendor/phpmailer/phpmailer/src/Exception.php';
	require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'vendor/phpmailer/phpmailer/src/SMTP.php';

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	if (isset($_POST["submit"]))
	{
		$accountno = $_POST["account"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$dob = $_POST["dob"];
		$phonenum = $_POST["phonenum"];
		$email = $_POST["email"];
		
		// $sql = "INSERT INTO customer VALUES ('$firstname', '$lastname', '$dob', '$phonenum', '$email', '$email', NULL, NULL, NULL, '$accountno', 0, 0)";
		if (isset($_POST['email']))
		{
			require 'vendor/autoload.php';
			$mail = new PHPMailer(true);		

			try
			{
			
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

				$mail->isSMTP();
				$mail->SMTPAuth = true;
				
				$mail->Host = "smtp.office365.com";
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = 587;

				$mail->Username = "baraihab490@outlook.sa";
				$mail->Password = "bIMKFY@1091";

				$mail->setFrom("baraihab490@outlook.sa");
				$mail->addAddress($email, "Saurav");

				$email_template = " Click on the Link Below to Complete your Horizon Bank Account Registration\n\nhttp://localhost/bankproject/admin_user_registration2.php?email=$email";
				
				$mail->Subject = "Email Verification for Horizon bank Registration";
				$mail->Body = $email_template;
				
				$mail->send();
				
				echo "<p>Verification Email sent to Registered Email</p>";
			
                $_SESSION['accountno'] = $accountno;
                $_SESSION['fname'] = $firstname;
                $_SESSION['lname'] = $lastname;
                $_SESSION['dob'] = $dob;
                $_SESSION['phonenum'] = $phonenum;
			}
			catch (Exception $e) 
			{
				echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
			}
			
		}
		else
		{
			echo "Record could not be added into the table.";
		}	

	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registration_css.scss">
    <style>
        p {
            color: white;
            font-size: 26px;
        }
    </style>
</head>
<body>

    <div class='right-container'>
    
    <form action="admin_user_registration1.php" method="post">
        <div class='container'>
        <div class='card'>
        <h1 style="font-size:22px" > Create A New Customer Account </h1>
        <br>
        <h1 style="font-size:14px" > Fill in the individual's personal information </h1>
        <br>
        <label class="input_label">Account Number</label><br>
        <input class='input' type="number" name="account" placeholder="XXXX-XXXX-XXXX">

        <br>
        <br>
        <label class="input_label">Fullname</label><br>
        <input class='input_field' type="text" name="firstname" placeholder ="First">
		<br>
		<br>
        <input class='input_field' type="text" name="lastname" placeholder ="Last">
		
		<br>
        <br>

        <label class="input_label"> Date of Birth </label><br>
        <input class='input_field' type="date" name="dob" placeholder="">
		
		<br>
        <br>

        <label class="input_label"> Phone Number </label><br>
        <input class='input_field' type="text" name="phonenum" placeholder="+60 XXXXXXXXXX">
        
        <br>
        <br>

		
        <label class="input_label"> Email Address </label><br>
        <input class='input_field' type="email" name="email" placeholder="test@test.com">

        </div>
        </div>
    
    <footer>
        
        <div class='set'>

		<input type="submit" name="submit" value="Register">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<form action="admin_homepage.php" method="post">
        <input type="button" onClick="location.href='admin_homepage.php'" value="Cancel">
        </div>
	</form>
    </footer>
    </form>
</div>
</body>
</html>